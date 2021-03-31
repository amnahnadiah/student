<?php

namespace App\Http\Controllers;

use Auth;
use App\Teacher;
use App\User;
use App\Profile;
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
        $teachers = Teacher::latest()->paginate(5);
  
        return view('teachers.index',compact('teachers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $position = $request->input('position');
        $acad_level = $request->input('acad_level');
        $deleteId = $request->input('deleteId');
        $status = $request->input('status');
        
        $model = new Teacher;
        $model->prof_id = Auth::profile()->id;
        $model->position = $position;
        $model->acad_level = $acad_level;
        $model->deleteId = $deleteId;
        $model->status = $status;
        $model->save();
   
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
        $model = Teacher::find($id);

        return view('teachers.show',[
            'id' => $id,
            'teacher' => $model,
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
        
        return view('teachers.edit',[
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
