<?php

namespace App\Http\Controllers;

use App\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alamats = Alamat::latest()->paginate(5);
  
        return view('alamats.index',compact('alamats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alamats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');
        
        $model = new Alamat;
        $model->street = $street;
        $model->city = $city;
        $model->state = $state;
        $model->zipcode = $zipcode;
        $model->country = $country;
        $model->save();
   
        return redirect()->route('alamat')
                        ->with('success','Address created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Alamat::find($id);

        return view('alamats.show',[
            'id' => $id,
            'alamat' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Alamat::find($id);
        
        return view('alamats.edit',[
            'id' => $id,
            'alamat' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');
        
        $model = Alamat::find($id);
        $model->street = $street;
        $model->city = $city;
        $model->state = $state;
        $model->zipcode = $zipcode;
        $model->country = $country;
        $model->save();

        return redirect()->route('alamat',[
                                    'id' => $id,
                                    'alamat' => $model,
                                ])
                        ->with('success','Address updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Alamat::find($id);
        $model->delete(); 
        
        return redirect()->route('alamat')
                        ->with('success','Address deleted successfully');
    }
}
