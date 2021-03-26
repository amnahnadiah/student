@extends('subjects.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Subjects</h2>
            </div>
          <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
           <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/subject-create"> Create New Subject</a>
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
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($subjects as $subject)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->description }}</td>
            <td>
                <form action="{{ Request::root() }}/subject-create" method="POST">
   
                    <a class="btn btn-info" href="{{ Request::root() }}/subject-show/{{ $subject->id }}">Show</a>
    
                    <a class="btn btn-info" href="{{ Request::root() }}/subject-edit/{{ $subject->id }}">Edit</a>
                </form>

                     <form action="{{ url('/subject-destroy/'.$subject->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $subjects->links() !!}
      
@endsection