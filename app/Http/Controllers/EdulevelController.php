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

        return redirect()->route('edulevels.index')
                        ->with('success','Edulevel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function show(Edulevel $edulevel)
    {
        return view('edulevels.show',compact('edulevel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Edulevel $edulevel)
    {
        return view('edulevels.edit',compact('edulevel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edulevel $edulevel)
    {
        $id = $edulevel ->id;
        $level = $request -> input('level');

        $model = Edulevel::where('id', $id)->first();
        $model ->level = $level;
        $model ->save();

         return redirect()->route('edulevels.index')
                        ->with('success','Edulevel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edulevel $edulevel)
    {
        $id = $edulevel ->id;
        $model = Edulevel::where('id', $id)->delete();
        //$product->delete();
  
        return redirect()->route('edulevels.index')
                        ->with('success','Edulevel deleted successfully');
    }
}
