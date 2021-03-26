<?php

namespace App\Http\Controllers;

use App\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardians = Guardian::latest()->paginate(5);
  
        return view('guardians.index',compact('guardians'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guardians.create');
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
        $relationship = $request->input('relationship');
        $phone = $request->input('phone');
        
        $model = new Guardian;
        $model->name = $name;
        $model->relationship = $relationship;
        $model->phone = $phone;
        $model->save();
   
        return redirect()->route('guardian')
                        ->with('success','Guardian created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Guardian::find($id);

        return view('guardians.show',[
            'id' => $id,
            'guardian' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Guardian::find($id);
        
        return view('guardians.edit',[
            'id' => $id,
            'guardian' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $relationship = $request->input('relationship');
        $phone = $request->input('phone');
        
        $model = Guardian::find($id);
        $model->name = $name;
        $model->relationship = $relationship;
        $model->phone = $phone;
        $model->save();

        return redirect()->route('guardian',[
                                    'id' => $id,
                                    'guardian' => $model,
                                ])
                        ->with('success','Guardian updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Guardian::find($id);
        $model->delete(); 
        
        return redirect()->route('guardian')
                        ->with('success','Guardian deleted successfully');
    }
}
