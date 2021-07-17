@extends('layouts.app')

@section('content')
<!-- Login-->
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h4 class="card-title mb-1">Welcome to Tuition Center! 👋</h4>
        <p class="card-text mb-2">Please sign-in to your account</p>
        <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
        @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input id="email" type="text" placeholder="example@example.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label for="password">Password</label><a href="{{ route('password.request') }}"><small>Forgot Password?</small></a>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input id="password" type="password" placeholder="........" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" tabindex="4">Log in</button>
        </form>
        <p class="text-center mt-2"><span>New on our platform?</span><a href="{{ route('register') }}"><span>&nbsp;Create an account</span></a></p>
    </div>
</div>
<!-- /Login-->
@endsection