@extends('edulevels.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Education Level</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
            </div>
             <div class="pull-right">
                <a class="btn btn-success" href="{{ Request::root() }}/edulevel-create"> Create New Edulevel</a>
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
                <form action="{{ Request::root() }}/edulevel-create" method="POST">
   
                     <a class="btn btn-info" href="{{ Request::root() }}/edulevel-show/{{ $edulevel->id }}">Show</a>

                     <a class="btn btn-info" href="{{ Request::root() }}/edulevel-edit/{{ $edulevel->id }}">Edit</a>
                </form>
   
                    <form action="{{ url('/edulevel-destroy/'.$edulevel->id)}}" method="POST">
                        
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $edulevels->links() !!}
      
@endsection
