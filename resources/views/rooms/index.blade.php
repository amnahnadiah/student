@extends('rooms.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tuition Centre</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rooms.create') }}"> Create New Room</a>
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
                <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('rooms.show',$room->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('rooms.edit',$room->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $rooms->links() !!}
      
@endsection
