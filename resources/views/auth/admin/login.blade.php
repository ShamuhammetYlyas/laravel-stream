@extends('layouts.admin-auth')
@section('auth-title') Login @endsection
@section('content')
<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
        </div>
        <h1 class="auth-title mb-5">Log in.</h1>
        
        <form action="{{ route('admin.auth') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-1">
                <input type="text" name="username" class="form-control form-control-xl @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            @error('username')
                <small class="invalid-feedback mb-2" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
            @enderror

            <div class="form-group position-relative has-icon-left mt-4">
                <input type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            @error('password')
                <small class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
            @enderror
            <div class="form-check form-check-lg d-flex align-items-end">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                    Keep me logged in
                </label>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p><a class="font-bold" href="#">Forgot password?</a>.</p>
        </div>
    </div>
</div>
@endsection