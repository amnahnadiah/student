@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                
                    @if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @else
                    <div class="panel-heading">You are not admin</div>
                    @endif

                    @if(auth()->user()->is_teacher == 1)
                    <a href="{{url('teacher/routes')}}">Teacher</a>
                    @else
                    <div class="panel-heading">You are not teacher</div>
                    @endif

                    @if(auth()->user()->is_student == 1)
                    <a href="{{url('student/routes')}}">Student</a>
                    @else
                    <div class="panel-heading">You are not student</div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
