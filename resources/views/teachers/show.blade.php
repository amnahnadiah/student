@extends('teachers.layout')
@section('content')
    <div class="row">
    </br>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Teacher</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ Request::root() }}/teacher"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position:</strong>
                {{ $teacher->position }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Academic Level:</strong>
                {{ $teacher->acad_level }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Delete ID:</strong>
                {{ $teacher->deleteId }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $teacher->status }}
            </div>
        </div>
    </div>
@endsection