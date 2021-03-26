<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::latest()->paginate(5);
  
        return view('rooms.index',compact('rooms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $name = $request -> input('name');
         $time = $request -> input('time');
         $date = $request -> input('date');
         $location = $request -> input('location');

        $model = new room;
        $model ->name = $name;
        $model ->time = $time;
        $model ->date = $date;
        $model ->location = $location;
        $model ->save();

        return redirect()->route('room')
                        ->with('success','Room created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Room::find($id);

        return view('rooms.show',[
            'id' => $id,
            'room' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Room::find($id);

        return view('rooms.edit',[
            'id' => $id,
            'room' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request -> input('name');
        $time = $request -> input('time');
        $date = $request -> input('date');
        $location = $request -> input('location');

        $model = Room::find($id);
        $model ->name = $name;
        $model ->time = $time;
        $model ->date = $date;
        $model ->location = $location;


        $model ->save();

         return redirect()->route('room',[
                            'id' => $id,
                            'room' => $model,
                        ])
                        ->with('success','Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Room::find($id);
        $model ->delete();
        
        return redirect()->route('room')
                        ->with('success','Room deleted successfully');
    }
}
