<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\Guardian;
use App\Student;
use App\Alamat;
use App\School;
use App\Students_school;
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
        if ($request->ajax()) {
            $data = Profile::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('profiles');
    }
        


        // $students = Student::latest()->paginate(5);
  
        // return view('students.index',compact('students'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    

    /**h
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function new()
    {
        return view('students.new');
    }

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
        $f_name = $request ->input('f_name');
        $l_name = $request ->input('l_name');
        $ic = $request ->input('ic');
        $phone = $request ->input('phone');
        $dob = $request ->input('dob');

        $grade = $request->input('grade');
        $gender = $request ->input('gender');
  
        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');

        $p_name = $request->input('p_name');
        $relationship = $request->input('relationship');
        $phone = $request->input('phone');

        $name = $request->input('name');
        $type = $request->input('type');
        $phone = $request->input('phone');
        $year = $request->input('year');
        
        $profile = new profile;
        $profile->f_name = $f_name;
        $profile->l_name = $l_name;
        $profile->ic = $ic;
        $profile->phone = $phone;
        $profile->dob = $dob;
        if($profile->save()){
            $profile_id = $profile->id;
            $student = new student;
            $student->grade = $grade;
            $student ->gender = $gender;
            $student->prof_id = $profile_id;
            if($student->save()){
                $school = new school;
                $school->name = $name;
                $school->type = $type;
                $school->phone = $phone;
                $school->year = $year;
                if($school->save()){
                    $studentSchool = new Students_school;
                    $studentSchool->stud_id = $student->id;
                    $studentSchool->school_id = $school->id;
                    if($studentSchool->save()){
                        $guardian = new guardian;
                        $guardian->p_name = $p_name;
                        $guardian->relationship = $relationship;
                        $guardian->phone = $phone;
                        $guardian->stud_id = $student->id;
                        if($guardian->save()){

                            $alamat = new alamat;
                            $alamat->prof_id = $profile_id;
                            $alamat->street = $street;
                            $alamat->city = $city;
                            $alamat->state = $state;
                            $alamat->zipcode = $zipcode;
                            $alamat->country = $country;
                            $alamat->save();
                        }
                    }

                }
            }
        }        

        // Auth::user()->users()->save($profile);

        // $student = new student;
        // $student->grade = $grade;
        // $student ->gender = $gender;
        // $profile->save();              

        // $alamat = new alamat;
        // $alamat->street = $street;
        // $alamat->city = $city;
        // $alamat->state = $state;
        // $alamat->zipcode = $zipcode;
        // $alamat->country = $country;
        // $profile->alamats()->save($alamat);

        // $guardian = new guardian;
        // $guardian->p_name = $p_name;
        // $guardian->relationship = $relationship;
        // $guardian->phone = $phone;
        // $student->guardians()->save($guardian);

        // $school = new school;
        // $school->name = $name;
        // $school->type = $type;
        // $school->phone = $phone;
        // $school->year = $year;
        // $student->save();

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
