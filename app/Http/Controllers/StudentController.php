<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\Guardian;
use App\Student;
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
        $students = Student::latest()->paginate(5);
  
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $grade = $request->input('grade');
        $deleteId = $request->input('deleteId');
        $status = $request->input('status');
        
        $model = new Student;
        $model->prof_id = Auth::profile()->id;
        $model->guardian_id = Auth::guardian()->id;
        $model->grade = $grade;
        $model->deleteId = $deleteId;
        $model->status = $status;
        $model->save();
   
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
        $model = Student::find($id);
        
        return view('students.edit',[
            'id' => $id,
            'student' => $model,
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
        $grade = $request->input('grade');
        $deleteId = $request->input('deleteId');
        $status = $request->input('status');
        
        $model = Student::find($id);
        $model->grade = $grade;
        $model->deleteId = $deleteId;
        $model->status = $status;
        $model->save();

        return redirect()->route('student',[
                                    'id' => $id,
                                    'student' => $model,
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
        $model = Student::find($id);
        $model->delete(); 
        
        return redirect()->route('student')
                        ->with('success','Student deleted successfully');
    }
}
