@extends('layouts.admin-auth')
@section('auth-title') Change password @endsection
@section('content')
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Change Password</h1>
                    

                    <form action="{{ route('admin.changePasswordPost') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-1">
                            <input type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="New password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @error('password')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror

                        <div class="form-group position-relative has-icon-left mt-3">
                            <input type="password" name="password_confirmation" class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror" placeholder="Re-type new password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <small class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Change password</button>
                    </form>
                    <div class="text-center mt-2 text-lg fs-4">
                        <p class='text-gray-600'>Remember your account? 
                            <a href="{{ route('admin.login') }}" class="font-bold">
                                Log in
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
@endsection