@extends('teachers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </br>
            <div class="pull-left">
                <h2>Teacher Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/teacher-create"> Create New Teacher</a>
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
            <th>Position</th>
            <th>Academic Level</th>
            <th>Delete ID</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $teacher->position }}</td>
            <td>{{ $teacher->acad_level }}</td>
            <td>{{ $teacher->deleteId }}</td>
            <td>{{ $teacher->status }}</td>
            <td>
                <form action="{{ Request::root() }}/teacher-create" method="POST">
   
                    <a class="btn btn-info" href="{{ Request::root() }}/teacher-show/{{ $teacher->id }}">Show</a>
                    <a class="btn btn-primary" href="{{ Request::root() }}/teacher-edit/{{ $teacher->id }}">Edit</a>

                </form>

                <form action="{{ url('/teacher-destroy/'.$teacher->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $teachers->links() !!}
      
@endsection