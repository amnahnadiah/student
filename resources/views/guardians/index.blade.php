@extends('guardians.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </br>
            <div class="pull-left">
                <h2>Guardian Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/guardian-create"> Create New Guardian</a>
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
            <th>Relationship</th>
            <th>Phone Number</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($guardians as $guardian)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $guardian->name }}</td>
            <td>{{ $guardian->relationship }}</td>
            <td>{{ $guardian->phone }}</td>
            <td>
                <form action="{{ Request::root() }}/guardian-create" method="POST">
   
                    <a class="btn btn-info" href="{{ Request::root() }}/guardian-show/{{ $guardian->id }}">Show</a>
                    <a class="btn btn-primary" href="{{ Request::root() }}/guardian-edit/{{ $guardian->id }}">Edit</a>

                </form>

                <form action="{{ url('/guardian-destroy/'.$guardian->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $guardians->links() !!}
      
@endsection