<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\Teacher;
use Datatables;
use Illuminate\Http\Request;

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
                    $actionBtn = '<a href="{{ Request::root() }}/teacher-show" class="edit btn btn-info btn-sm">View</a> 
                                    <a href="{{ Request::root() }}/teacher-edit/{{ $teacher->id }}" class="edit btn btn-success btn-sm">Edit</a> 
                                    <a href="{{ Request::root() }}/teacher-destroy/{{ $teacher->id }}" class="delete btn btn-danger btn-sm">Delete</a>';
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
        $phone = $request->input('phone');
        $ic = $request->input('ic');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $status = $request->input('status');
        $is_teacher = $request->input('is_teacher');
        
        $user = new User;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
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
                $teacher->save();
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
        $teachers = Teacher::with('profile')->findOrFail($id);
        // $teachers = Teacher::find($id);
        
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
        $model = Teacher::find($id);
        
        return view('teachers.update',[
            'id' => $id,
            'teacher' => $model,
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
        $position = $request->input('position');
        $acad_level = $request->input('acad_level');
        $deleteId = $request->input('deleteId');
        $status = $request->input('status');
        
        $model = Teacher::find($id);
        $model->position = $position;
        $model->acad_level = $acad_level;
        $model->deleteId = $deleteId;
        $model->status = $status;
        $model->save();

        return redirect()->route('teacher',[
                                    'id' => $id,
                                    'teacher' => $model,
                                ])
                        ->with('success','Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Teacher::find($id);
        $model->delete(); 
        
        return redirect()->route('teacher')
                        ->with('success','Teacher deleted successfully');
    }
}
