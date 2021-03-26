@extends('edulevels.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Education level</h2>
            </div>
             <div class="pull-right">
                <a class="btn btn-primary" href="{{ Request::root() }}/edulevel"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level:</strong>
                {{ $edulevel->level }}
            </div>
        </div>
    
        </div>
@endsection