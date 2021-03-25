@extends('profiles.layout')
@section('content')
    <div class="row">
    </br>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ Request::root() }}/profile"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First name:</strong>
                {{ $profile->f_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last name:</strong>
                {{ $profile->l_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>I/C:</strong>
                {{ $profile->ic }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone number:</strong>
                {{ $profile->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date of birth:</strong>
                {{ $profile->dob }}
            </div>
        </div>
    </div>
@endsection