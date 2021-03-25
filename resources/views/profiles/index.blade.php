@extends('profiles.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </br>
            <div class="pull-left">
                <h2>Profile Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/profile-create"> Create New Profile</a>
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
            <th>First name</th>
            <th>Last name</th>
            <th>I/C</th>
            <th>Phone number</th>
            <th>Date of birth</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($profiles as $profile)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $profile->f_name }}</td>
            <td>{{ $profile->l_name }}</td>
            <td>{{ $profile->ic }}</td>
            <td>{{ $profile->phone }}</td>
            <td>{{ $profile->dob }}</td>
            <td>
                <form action="{{ Request::root() }}/profile-create" method="POST">
   
                    <a class="btn btn-info" href="{{ Request::root() }}/profile-show/{{ $profile->id }}">Show</a>
                    <a class="btn btn-primary" href="{{ Request::root() }}/profile-edit/{{ $profile->id }}">Edit</a>

                </form>

                <form action="{{ url('/profile-destroy/'.$profile->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $profiles->links() !!}
      
@endsection