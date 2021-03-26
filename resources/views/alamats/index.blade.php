@extends('alamats.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </br>
            <div class="pull-left">
                <h2>Address Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/alamat-create"> Create New Address</a>
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
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Zipcode</th>
            <th>Country</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($alamats as $alamat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $alamat->street }}</td>
            <td>{{ $alamat->city }}</td>
            <td>{{ $alamat->state }}</td>
            <td>{{ $alamat->zipcode }}</td>
            <td>{{ $alamat->country }}</td>
            <td>
                <form action="{{ Request::root() }}/alamat-create" method="POST">
   
                    <a class="btn btn-info" href="{{ Request::root() }}/alamat-show/{{ $alamat->id }}">Show</a>
                    <a class="btn btn-primary" href="{{ Request::root() }}/alamat-edit/{{ $alamat->id }}">Edit</a>

                </form>

                <form action="{{ url('/alamat-destroy/'.$alamat->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $alamats->links() !!}
      
@endsection