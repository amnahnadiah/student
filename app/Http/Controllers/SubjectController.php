<?php

namespace App\Http\Controllers;

use App\Subject;
use Datatables;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('subjects.list');
        // $subjects = Subject::latest()->paginate(5);
  
        // return view('subjects.index',compact('subjects'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

    }
     public function fetch()
    {
        if (request()->ajax())
        {
            $subjects = Subject::latest()->get();
           
            return Datatables::of($subjects)
                ->addIndexColumn()
                ->addColumn('id', function($row)
                {
                    return $row->id;
                })
                ->addColumn('name', function($row)
                {
                    return $row->name;
                })
                ->addColumn('description', function($row)
                {
                    return $row->description;
                })
                ->addColumn('action', function($row)
                {
                    $url = url('/');
                    $actionBtn = '<a href="'.$url.'/subject-show/'.$row->id.'" class="edit btn btn-info btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
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
        $description = $request -> input('description');

        $model = new subject;
        $model ->name = $name;
        $model ->description = $description;
        $model ->save();

        return redirect()->route('subject')
                        ->with('success','Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Subject::find($id);

        return view('subjects.show',[
            'id' => $id, 
            'subject' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Subject::find($id);

        return view('subjects.edit',[
            'id' => $id, 
            'subject' => $model,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request -> input('name');
        $description = $request -> input('description');

        $model = Subject::find($id);
        $model ->name = $name;
        $model ->description = $description;
      
        $model ->save();

         return redirect()->route('subject',[
                                     'id' => $id, 
                                   'subject' => $model,
                                ])
                        ->with('success','Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Subject::find($id);
        $model ->delete();
  
        return redirect()->route('subject')
                        ->with('success','Subject deleted successfully');
    }
}
