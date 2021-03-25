@extends('profiles.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Profiles</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ Request::root() }}/profile"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ url('profile-update/'.$profile->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First name:</strong>
                    <input type="text" name="f_name" value="{{ $profile->f_name }}" class=form-control placeholder="First name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last name:</strong>
                    <input type="text" name="l_name" value="{{ $profile->l_name }}" class=form-control placeholder="Last name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>I/C:</strong>
                    <input type="int" name="ic" value="{{ $profile->ic }}" class=form-control placeholder="I/C">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone number:</strong>
                    <input type="int" name="phone" value="{{ $profile->phone }}" class=form-control placeholder="Phone number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date of birth:</strong>
                    <input type="date" name="dob" value="{{ $profile->dob }}" class=form-control placeholder="Date of birth">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection