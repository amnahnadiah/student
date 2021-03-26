<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::latest()->paginate(5);
  
        return view('schools.index',compact('schools'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $phone = $request->input('phone');
        $year = $request->input('year');
        
        $model = new School;
        $model->name = $name;
        $model->type = $type;
        $model->phone = $phone;
        $model->year = $year;
        $model->save();
   
        return redirect()->route('school')
                        ->with('success','School created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = School::find($id);

        return view('schools.show',[
            'id' => $id,
            'school' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = School::find($id);
        
        return view('schools.edit',[
            'id' => $id,
            'school' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $phone = $request->input('phone');
        $year = $request->input('year');
        
        $model = School::find($id);
        $model->name = $name;
        $model->type = $type;
        $model->phone = $phone;
        $model->year = $year;
        $model->save();

        return redirect()->route('school',[
                                    'id' => $id,
                                    'school' => $model,
                                ])
                        ->with('success','School updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = School::find($id);
        $model->delete(); 
        
        return redirect()->route('school')
                        ->with('success','School deleted successfully');
    }
}
