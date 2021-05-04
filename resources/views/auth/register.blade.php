@extends('layouts.app')

@section('content')
<!-- Register-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h4 class="card-title mb-1">Welcome to Tuition Center! 👋</h4>
        <p class="card-text mb-2">Register here to explore more!</p>
        <form class="auth-register-form mt-2" action="{{ route('register') }}" method="POST">
        @csrf
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input id="username" type="text" placeholder="example" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input id="email" type="email" placeholder="example@example.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input id="password" type="password" placeholder="........" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" placeholder="........" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-group form-check form-switch">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="is_student" name="is_student" value=1 type="checkbox" tabindex="4" />
                    <label class="custom-control-label" for="is_student">Are you a student?</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" tabindex="5">Sign up</button>
        </form>
        <p class="text-center mt-2"><span>Already have an account?</span><a href="{{ route('login') }}"><span>&nbsp;Sign in instead</span></a></p>
    </div>
</div>
<!-- /Register-->
@endsection
