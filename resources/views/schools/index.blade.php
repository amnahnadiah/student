@extends('schools.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </br>
            <div class="pull-left">
                <h2>School Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/school-create"> Create New School</a>
            </div>
            
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th>Phone Number</th>
            <th>Year</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($schools as $school)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $school->name }}</td>
            <td>{{ $school->type }}</td>
            <td>{{ $school->phone }}</td>
            <td>{{ $school->year }}</td>
            <td>
                <form action="{{ Request::root() }}/school-create" method="POST">
   
                    <a class="btn btn-info" href="{{ Request::root() }}/school-show/{{ $school->id }}">Show</a>
                    <a class="btn btn-primary" href="{{ Request::root() }}/school-edit/{{ $school->id }}">Edit</a>

                </form>

                <form action="{{ url('/school-destroy/'.$school->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $schools->links() !!}
      
@endsection