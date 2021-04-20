@extends('students.list')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </br>
            <div class="pull-left">
                <h2>Student Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/student-create"> Create New Student</a>
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
            <th>Grade</th>
            <th>Delete ID</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->grade }}</td>
            <td>{{ $student->deleteId }}</td>
            <td>{{ $student->status }}</td>
            <td>
                <form action="{{ Request::root() }}/student-create" method="POST">
   
                    <a class="btn btn-info" href="{{ Request::root() }}/student-show/{{ $student->id }}">Show</a>
                    <a class="btn btn-primary" href="{{ Request::root() }}/student-edit/{{ $student->id }}">Edit</a>

                </form>

                <form action="{{ url('/student-destroy/'.$student->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $students->links() !!}
      
@endsection