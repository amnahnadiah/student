<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::latest()->paginate(5);
  
        return view('profiles.index',compact('profiles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user_id = auth()->id();
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $ic = $request->input('ic');
        $phone = $request->input('phone');
        $dob = $request->input('dob');
        
        $model = new profile;
        $model->user_id = Auth::user()->id;
        $model->f_name = $f_name;
        $model->l_name = $l_name;
        $model->ic = $ic;
        $model->phone = $phone;
        $model->dob = $dob;
        $model->save();
   
        return redirect()->route('profile')
                        ->with('success','Profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Profile::find($id);

        return view('profiles.show',[
            'id' => $id,
            'profile' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Profile::find($id);
        
        return view('profiles.edit',[
            'id' => $id,
            'profile' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $ic = $request->input('ic');
        $phone = $request->input('phone');
        $dob = $request->input('dob');
        
        $model = Profile::find($id);
        //$user_id = Auth::user()->id;
        $model->f_name = $f_name;
        $model->l_name = $l_name;
        $model->ic = $ic;
        $model->phone = $phone;
        $model->dob = $dob;
        $model->save();

        return redirect()->route('profile',[
                                    'id' => $id,
                                    'profile' => $model,
                                ])
                        ->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Profile::find($id);
        $model->delete(); 
        
        return redirect()->route('profile')
                        ->with('success','Profile deleted successfully');
    }
}
