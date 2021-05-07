<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\Guardian;
use App\Student;
use App\Alamat;
use App\School;
use App\Edulevel;
use App\Students_school;
use App\Profiles_edulevel;
use Datatables;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         return view('students.list');


        // $students = Student::latest()->paginate(5);
  
        // return view('students.index',compact('students'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function fetch()
    {
        if (request()->ajax()) 
        {
            $students = Student::latest()->get();

            return Datatables::of($students)
                ->addIndexColumn()
                ->addColumn('id', function($row)
                {
                    return $row->id;
                }) 
                ->addColumn('f_name', function($row)
                {
                    return $row->profiles->f_name;
                })
                 ->addColumn('email', function($row)
                {
                    return $row->profiles->users->email;
                })
                ->addColumn('phone', function($row)
                {
                    return $row->profiles->phone;
                })
                ->addColumn('address', function($row)
                {
                    return $row->profiles->alamats->street;
                    return $row->profiles->alamats->city;
                })
                ->addColumn('acad_level', function($row)
                {
                    return $row->profiles->profileEdulevel->edulevelsOne->level;                                  
                })
               
                ->addColumn('action', function($row)
                {
                    $url = url('/');
                    $actionBtn = '<a href="'.$url.'/student-show/'.$row->id.'" class="btn btn-outline-info round">View</a>';
                               
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**h
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function new()
    {
        return view('students.new');
    }

    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $f_name = $request ->input('f_name');
        $l_name = $request ->input('l_name');
        $ic = $request ->input('ic');
        $phone = $request ->input('phone');
        $dob = $request ->input('dob');

        $grade = $request->input('grade');
        $gender = $request ->input('gender');
  
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');

        $p_name = $request->input('p_name');
        $relationship = $request->input('relationship');
        $p_phone = $request->input('p_phone');

        $s_name = $request->input('s_name');
        $type = $request->input('type');
        $acad_level = $request->input('acad_level');
        $s_phone = $request->input('s_phone');
        $year = $request->input('year');

        $edu_id = $request->input('edu_id');

        $user = User::where('id',$id)->first();
        if($user->save())
        {
            $profile = new profile;
            $profile->f_name = $f_name;
            $profile->l_name = $l_name;
            $profile->ic = $ic;
            $profile->phone = $phone;
            $profile->dob = $dob;
            $profile->user_id = $user->id;          
            if($profile->save())
            {
                $student = new student;
                $student->grade = $grade;
                $student ->gender = $gender;
                $student->prof_id = $profile->id;      
                if($student->save())
                {
                    $school = new school;
                    $school->s_name = $s_name;
                    $school->type = $type;
                    $school->acad_level = $acad_level;
                    $school->s_phone = $s_phone;
                    $school->year = $year;
                    if($school->save())
                    {
                        $studentSchool = new Students_school;
                        $studentSchool->stud_id = $student->id; 
                        $studentSchool->school_id = $school->id;
                        if($studentSchool->save())
                        {
                            $profEdulevel = new Profiles_edulevel;
                            $profEdulevel->prof_id = $profile->id;
                            $profEdulevel->edu_id = $edu_id;
                            if($profEdulevel->save())
                            {
                                $guardian = new guardian;
                                $guardian->p_name = $p_name;
                                $guardian->relationship = $relationship;
                                $guardian->p_phone = $p_phone;
                                $guardian->stud_id = $student->id;
                                if($guardian->save())
                                {
                                    $alamat = new alamat;
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
            }        
        }
        // Auth::user()->users()->save($profile);

        return redirect()->route('student')
                        ->with('success','Student created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $model = Student::find($id);

        return view('students.show',[
            'id' => $id,
            'student' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        
        return view('students.edit',[
            'id' => $id,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $id = Auth::user()->id;

        $username = $request->input('username');
        $email = $request->input('email');

        $f_name = $request ->input('f_name');
        $l_name = $request ->input('l_name');
        $ic = $request ->input('ic');
        $phone = $request ->input('phone');
        $dob = $request ->input('dob');

        $gender = $request ->input('gender');
  
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');

        $p_name = $request->input('p_name');
        $relationship = $request->input('relationship');
        $p_phone = $request->input('p_phone');

        $s_name = $request->input('s_name');
        $type = $request->input('type');
        $acad_level = $request->input('acad_level');
        $s_phone = $request->input('s_phone');
        $year = $request->input('year');

        $edu_id = $request->input('edu_id');
        
        // $user = User::where('id',$id)->first();
        // if($user->save())
        // {
            $student = Student::find($id);
            $student->gender = $gender;
            // $student->prof_id = $profile->id;      
            if($student->save())
           
            {
                $prof_id = $student->profiles->id;
                $profile = Profile::find($prof_id);
                $profile->f_name = $f_name;
                $profile->l_name = $l_name;
                $profile->ic = $ic;
                $profile->phone = $phone;
                $profile->dob = $dob;         
                if($profile->save())
                {
                    $user_id = $profile->users->id;
                    $user = User::find($user_id);
                    $user->username = $username;
                    $user->email = $email;
                    if($user->save());
                    {
                         $prof_id = $profile->alamats->id;
                         $alamat = Alamat::find($prof_id);
                         $alamat->street = $street;
                         $alamat->city = $city;
                         $alamat->state = $state;
                         $alamat->zipcode = $zipcode;
                         $alamat->country = $country;
                         if($alamat->save())
                        {
                            $prof_id = $profile->profileEdulevel->id;
                            $profEdulevel = Profiles_edulevel::find($prof_id);
                            $profEdulevel->edu_id = $edu_id;
                            if($profEdulevel->save());
                            {
                                $stud_id = $student->guardians->id;
                                $guardian = Guardian::find($stud_id);
                                $guardian->p_name = $p_name;
                                $guardian->relationship = $relationship;
                                $guardian->p_phone = $p_phone;
                                $guardian->stud_id = $student->id;
                                if($guardian->save());
                                {
                                    $stud_id = $student->studentSchoolOne->id;
                                    $studentSchool = Students_school::find($stud_id);
                                    if($studentSchool->save());
                                    {
                                        $school_id = $studentSchool->schoolsOne->id;
                                        $school = School::find($school_id);
                                        $school->s_name = $s_name;
                                        $school->type = $type;
                                        $school->acad_level = $acad_level;
                                        $school->s_phone = $s_phone;
                                        $school->year = $year;
                                        $school->save();
                                    }  
                                }
                            
                            }
                        }
                    }
                }
            }        
 
        return redirect()->route('student',[
                                    'id' => $id,
                                    // 'student' => $model,
                                ])
                        ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $stud_id = $student->guardians->id;
        $guardian = Guardian::find($stud_id);
        if($guardian->delete());
        {     
            $stud_id = $student->studentSchoolOne->id;
            $studentSchool = Students_school::find($stud_id);
            if($studentSchool->delete());     
            {
                $stud_id = $studentSchool->studentsOne->id;
                $student = Student::find($stud_id);
                if($student->delete()); 
                {
                    $school_id = $studentSchool->schoolsOne->id;
                    $school = School::find($school_id);
                    if($school->delete());
                    {
                        $prof_id = $student->profiles->id;
                        $profile = Profile::find($prof_id);  
                        $prof_id = $profile->alamats->id;
                        $alamat = Alamat::find($prof_id);
                        if($alamat->delete());
                        {  
                            $prof_id = $profile->profileEdulevel->id;
                            $profEdulevel = Profiles_edulevel::find($prof_id);
                            if($profEdulevel->delete());
                            {
                                        $prof_id = $profEdulevel->profilesOne->id;
                                        $profile = Profile::find($prof_id);        
                                        $profile->delete();  
                                        // {
                                        //     $user_id = $profile->users->id;
                                        //     $user = User::find($user_id);
                                        //     $user->delete();
                                        // } 
                                    
                                 
                            }   
                        }
                    }
                }
            }
        }
        return redirect()->route('student')
                        ->with('success','Student deleted successfully');
    }    
}
