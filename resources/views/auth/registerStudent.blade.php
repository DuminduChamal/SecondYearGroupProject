@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="header bg-gradient-primary py-7 py-lg-8">
<div class="container">
    <div class="header-body text-center mb-7">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6">
        <h1 class="text-white">Welcome!</h1>
        <p class="text-lead text-light">Use these awesome forms to login or create new account in your project for free.</p>
        </div>
    </div>
    </div>
</div>
<div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
    </svg>
</div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
<!-- Table -->
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
    <div class="card bg-secondary shadow border-0">
        <div class="card-header bg-transparent pb-5">
        <div class="text-center mt-2 mb-4">Sign up with</div>
        <div class="text-center">
            <a href="#" class="btn btn-neutral btn-icon mr-4">
            <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
            <span class="btn-inner--text">Github</span>
            </a>
            <a href="#" class="btn btn-neutral btn-icon">
            <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
            <span class="btn-inner--text">Google</span>
            </a>
        </div>
        </div>
        <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text mb-4">
            Or sign up with credentials
        </div>
        <form role="form" method="POST" action="{{ route('register.student') }}">
            @csrf
            <div class="form-group">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                </div>
                <input id="FName" type="text" placeholder="First Name" class="form-control @error('FName') is-invalid @enderror" name="FName" value="{{ old('FName') }}" required autocomplete="FName" autofocus>
                @error('FName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                </div>
                <input id="LName" type="text" placeholder="Last Name" class="form-control @error('LName') is-invalid @enderror" name="LName" value="{{ old('LName') }}" required autocomplete="LName" autofocus>
                @error('LName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input id="email" type="text" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input id="DOB" type="date" placeholder="Date of Birth" class="form-control @error('DOB') is-invalid @enderror" name="DOB" value="{{ old('DOB') }}" required autocomplete="DOB" autofocus>
                @error('DOB')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-support-16"></i></span>
                </div>
                <input id="NIC" type="text" placeholder="National Identity Card" class="form-control @error('NIC') is-invalid @enderror" name="NIC" value="{{ old('NIC') }}" autocomplete="NIC" autofocus>
                @error('NIC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                {{-- <input class="form-control" placeholder="Password" type="password"> --}}
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                {{-- <input class="form-control" placeholder="Confirm Password" type="password" password_confirmation> --}}
            </div>
            </div>
            {{-- <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div>
            <div class="row my-4">
            <div class="col-12">
                <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                <label class="custom-control-label" for="customCheckRegister">
                    <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                </label>
                </div>
            </div>
            </div> --}}
            <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Create account</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
