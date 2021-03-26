@extends('rooms.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Room</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/room-create"> Create New Room</a>
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
            <th>Time</th>
            <th>Date</th>
            <th>Location</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($rooms as $room)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->time }}</td>
            <td>{{ $room->date }}</td>
            <td>{{ $room->location }}</td>

            <td>
                <form action="{{ Request::root() }}/room-create" method="POST">
   
                   <a class="btn btn-info" href="{{ Request::root() }}/room-show/{{ $room->id }}room">Show</a>
    
                    <a class="btn btn-info" href="{{ Request::root() }}/room-edit/{{ $room->id }}">Edit</a>

                </form>
   
                    <form action="{{ url('/room-destroy/'.$room->id)}}" method="POST">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $rooms->links() !!}
      
@endsection
