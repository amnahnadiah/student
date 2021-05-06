<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\Teacher;
use App\Alamat;
use App\School;
use App\Teachers_school;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $model = User::with('userProfile')->where('id',$id)->first();
        // echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        // echo '<pre>';
        // print_r(Auth::user()->userProfile->toArray());
        // echo '</pre>';
        // die();

        // $teachers = Teacher::latest()->paginate(5);

        // return view('teachers.list',compact('teachers'))
        //         ->with('i', (request()->input('page', 1) - 1) * 5);

        return view('teachers.list');
    }

    public function fetch()
    {
        // print_r(url('/'));
        // die();
        if (request()->ajax())
        {
            $teachers = Teacher::latest()->get();
           
            return Datatables::of($teachers)
                ->addIndexColumn()
                ->addColumn('id', function($row)
                {
                    return $row->id;
                })
                ->addColumn('f_name', function($row)
                {
                    return $row->teacherProfile->f_name;
                })
                ->addColumn('l_name', function($row)
                {
                    return $row->teacherProfile->l_name;
                })
                ->addColumn('email', function($row)
                {
                    return $row->teacherProfile->profileUser->email;
                })
                ->addColumn('phone', function($row)
                {
                    return $row->teacherProfile->phone;
                })
                ->addColumn('status', function($row)
                {
                    return $row->status;
                })
                ->addColumn('action', function($row)
                {
                    $url = url('/');
                    $actionBtn = '<a href="'.$url.'/teacher-show/'.$row->id.'" class="edit btn btn-smbtn btn-outline-primary round waves-effect">View</a>
                                <a href="'.$url.'/teacher-destroy/'.$row->id.'" class="edit btn btn-smbtn btn-outline-danger round waves-effect">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function kosong()
    {
        return view('teachers.kosong');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $model = User::with('userProfile')->where('id',$id)->first()->toArray();
        // echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $hashed = Hash::make($password);
        $phone = $request->input('phone');
        $ic = $request->input('ic');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $status = $request->input('status');
        $is_teacher = $request->input('is_teacher');
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');
        $s_name = $request->input('s_name');
        $type = $request->input('type');
        $year = $request->input('year');
        $acad_level = $request->input('acad_level');
        
        $user = new User;
        $user->username = $username;
        $user->email = $email;
        $user->password = $hashed;
        $user->is_teacher = $is_teacher;
        if($user->save())
        {
            $profile = new Profile;
            $profile->f_name = $f_name;
            $profile->l_name = $l_name;
            $profile->phone = $phone;
            $profile->ic = $ic;
            $profile->dob = $dob;
            $profile->user_id = $user->id;
            if($profile->save())
            {
                $teacher = new Teacher;
                $teacher->gender = $gender;
                $teacher->status = $status;
                $teacher->prof_id = $profile->id;
                if($teacher->save())
                {
                    $school = new School;
                    $school->s_name = $s_name;
                    $school->type = $type;
                    $school->year = $year;
                    $school->acad_level = $acad_level;
                    if($school->save())
                    {
                        $teachersSchool = new Teachers_school;
                        $teachersSchool->teacher_id = $teacher->id;
                        $teachersSchool->school_id = $school->id;
                        if($teachersSchool->save())
                        {
                            $prof_id = $teacher->teacherProfile->id;
                            $profile = Profile::find($prof_id);
                            $alamat = new Alamat;
                            $alamat->prof_id = $profile->id;
                            $alamat->street = $street;
                            $alamat->city = $city;
                            $alamat->state = $state;
                            $alamat->zipcode = $zipcode;
                            $alamat->country = $country;
                            $alamat->save();
                        }
                    }
                }
            }
        }
        
        // $profile = new Profile;
        // $profile->f_name = $f_name;
        // $profile->l_name = $l_name;
        // $profile->phone = $phone;
        // $profile->ic = $ic;
        // $profile->dob = $dob;
        // $user->userProfile()->save($profile);

        // $teacher = new Teacher;
        // $teacher->gender = $gender;
        // $teacher->status = $status;
        // $profile->profileTeacher()->save($teacher);

        return redirect()->route('teacher')
                        ->with('success','Teacher created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $userId = $id ?: auth()->user()->id;
    
        // $teacher = Teacher::with('teacherProfile')->find($userId);
        $teacher = Teacher::find($id);
        
        // echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        // die();
        return view('teachers.view',[
            'id' => $id,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        
        return view('teachers.update',[
            'id' => $id,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $username = $request->input('username');
        $email = $request->input('email');
        // $password = $request->input('password');
        // $hashed = Hash::make($password);
        $ic = $request->input('ic');
        $dob = $request->input('dob');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $status = $request->input('status');
        
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');

        $s_name = $request->input('s_name');
        $type = $request->input('type');
        $year = $request->input('year');
        $acad_level = $request->input('acad_level');

        $teacher = Teacher::find($id);
        $teacher->gender = $gender;
        $teacher->status = $status;
        if($teacher->save())
        {
            $teacher_id = $teacher->teacherSchoolOne->id;
            $teachersSchool = Teachers_school::find($teacher_id);
            if($teachersSchool->save())
            {
                $school_id = $teachersSchool->schoolsOne->id;
                $school = School::find($school_id);
                $school->s_name = $s_name;
                $school->type = $type;
                $school->year = $year;
                $school->acad_level = $acad_level;
                $school->save();
            }

            $prof_id = $teacher->teacherProfile->id;
            // $teacher->teacherProfile->sync([$prof_id]);
            // $teacher->prof_id = $profile->id;
            // $profile = Teacher::where('prof_id', $profile->id)->find(1);
            $profile = Profile::find($prof_id);
            $profile->f_name = $f_name;
            $profile->l_name = $l_name;
            $profile->ic = $ic;
            $profile->dob = $dob;
            $profile->phone = $phone;
            if($profile->save())
            {
                $prof_id = $profile->profileAlamat->id;
                $alamat = Alamat::find($prof_id);
                $alamat->street = $street;
                $alamat->city = $city;
                $alamat->state = $state;
                $alamat->zipcode = $zipcode;
                $alamat->country = $country;
                if($alamat->save())
                {
                    $user_id = $profile->profileUser->id;
                    // $teacher->teacherProfile->profileUser->sync([$user_id]);
                    // $profile->user_id = $user->id;
                    $user = User::find($user_id);
                    $user->username = $username;
                    $user->email = $email;
                    // $user->password = $hashed;
                    $user->save();
                }
            }
        }
        return view('teacher',[
            'id' => $id,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher_id = $teacher->teacherSchoolOne->id;
        $teachersSchool = Teachers_school::find($teacher_id);
        if($teachersSchool->delete())
        {
            $school_id = $teachersSchool->schoolsOne->id;
            $school = School::find($school_id);
            if($school->delete())
            {
                $teacher = Teacher::find($id);
                if($teacher->delete())
                {
                    $prof_id = $teacher->teacherProfile->id;
                    $profile = Profile::find($prof_id);
                    $prof_id = $profile->profileAlamat->id;
                    $alamat = Alamat::find($prof_id);
                    if($alamat->delete())
                    {
                        $prof_id = $teacher->teacherProfile->id;
                        $profile = Profile::find($prof_id);
                        if($profile->delete())
                        {
                            $user_id = $profile->profileUser->id;
                            $user = User::find($user_id);
                            $user->delete();
                        }
                    }
                }
            }
        }
        
        return redirect()->route('teacher')
                        ->with('success','Teacher deleted successfully');
    }
}
