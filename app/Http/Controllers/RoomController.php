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

        return redirect()->route('rooms.index')
                        ->with('success','Room created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit',compact('room'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $id = $room ->id;
        $name = $request -> input('name');
        $time = $request -> input('time');
        $date = $request -> input('date');
        $location = $request -> input('location');

        $model = Room::where('id', $id)->first();
        $model ->name = $name;
        $model ->time = $time;
        $model ->date = $date;
        $model ->location = $location;


        $model ->save();

         return redirect()->route('rooms.index')
                        ->with('success','Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Class  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $id = $room ->id;
        $model = Room::where('id', $id)->delete();
        //$product->delete();
  
        return redirect()->route('rooms.index')
                        ->with('success','Room deleted successfully');
    }
}
