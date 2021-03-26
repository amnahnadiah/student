@extends('guardians.layout')
@section('content')
    <div class="row">
    </br>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Guardian</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ Request::root() }}/guardian"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $guardian->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Relationship:</strong>
                {{ $guardian->relationship }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone Number:</strong>
                {{ $guardian->phone }}
            </div>
        </div>
    </div>
@endsection