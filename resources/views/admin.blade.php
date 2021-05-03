@extends('home')
 
@section('content')
 
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading btn-primary">WELCOME TO ADMIN ROUTE</div>
            <a href="{{ Request::root() }}/subject">Subject</a>
            <a href="{{ Request::root() }}/teacher">Teacher</a>
            <a href="{{ Request::root() }}/edulevel">Education Level</a>
        </div>
    </div>
</div>
 
@endsection