@extends('edulevels.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tuition Centre</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('edulevels.create') }}"> Create New Edulevel</a>
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
            <th>Level</th>
            <!-- <th>Description</th> -->
            <th width="280px">Action</th>
        </tr>
        @foreach ($edulevels as $edulevel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $edulevel->level }}</td>
            
            <td>
                <form action="{{ route('edulevels.destroy',$edulevel->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('edulevels.show',$edulevel->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('edulevels.edit',$edulevel->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $edulevels->links() !!}
      
@endsection
