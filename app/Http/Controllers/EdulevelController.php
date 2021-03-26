<?php

namespace App\Http\Controllers;

use App\Edulevel;
use Illuminate\Http\Request;

class EdulevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edulevels = Edulevel::latest()->paginate(5);
  
        return view('edulevels.index',compact('edulevels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edulevels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = $request -> input('level');

        $model = new edulevel;
        $model ->level = $level;
        $model ->save();

        return redirect()->route('edulevel')
                        ->with('success','Edulevel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Edulevel::find($id);

        return view('edulevels.show',[
            'id' => $id,
            'edulevel' =>$model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Edulevel::find($id);

        return view('edulevels.edit',[
            'id' => $id,
            'edulevel' => $model,            
        ]);
     }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $level = $request -> input('level');

        $model = Edulevel::find($id);
        $model ->level = $level;
        $model ->save();

         return redirect()->route('edulevel',[
                                    'id' => $id,
                            'edulevel' => $model,
                        ])
                     ->with('success', 'Edulevel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Edulevel::find($id);
        $model ->delete();
  
        return redirect()->route('edulevel')
                        ->with('success','Edulevel deleted successfully');
    }
}
