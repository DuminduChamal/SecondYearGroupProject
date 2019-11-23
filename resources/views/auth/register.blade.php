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
            <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    {{-- <input class="form-control" placeholder="Name" type="text"> --}}
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
                    <input id="NIC" type="text" placeholder="National Identity Card" class="form-control @error('NIC') is-invalid @enderror" name="NIC" value="{{ old('NIC') }}" required autocomplete="NIC" autofocus>
                    @error('NIC')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-paper-diploma"></i></span>
                    </div>
                    <input id="Qualification" type="text" placeholder="Qualification" class="form-control @error('Qualification') is-invalid @enderror" name="Qualification" value="{{ old('Qualification') }}" required autocomplete="Qualification" autofocus>
                    @error('Qualification')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-controller"></i></span>
                    </div>
                    <input id="subject_id" type="integer" placeholder="Subject" class="form-control @error('subject_id') is-invalid @enderror" name="subject_id" value="{{ old('subject_id') }}" required autocomplete="subject_id" autofocus>
                    @error('subject_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                    </div>
                    <input id="rate" type="integer" placeholder="Rate" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ old('rate') }}" required autocomplete="rate" autofocus>
                    @error('rate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-satisfied"></i></span>
                    </div>
                    <input id="referName" type="text" placeholder="Refree Name" class="form-control @error('referName') is-invalid @enderror" name="referName" value="{{ old('referName') }}" required autocomplete="referName" autofocus>
                    @error('referName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                    </div>
                    <input id="referStatus" type="text" placeholder="Refree Status" class="form-control @error('referStatus') is-invalid @enderror" name="referStatus" value="{{ old('referStatus') }}" required autocomplete="referStatus" autofocus>
                    @error('referStatus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-send"></i></span>
                    </div>
                    <input id="referEmail" type="email" placeholder="Refree Email" class="form-control @error('referEmail') is-invalid @enderror" name="referEmail" value="{{ old('referEmail') }}" required autocomplete="referEmail" autofocus>
                    @error('referEmail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    <input id="referNumber" type="integer" placeholder="Refree Number" class="form-control @error('referNumber') is-invalid @enderror" name="referNumber" value="{{ old('referNumber') }}" required autocomplete="referNumber" autofocus>
                    @error('referNumber')
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
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tutor Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="FName" type="text" class="form-control @error('name') is-invalid @enderror" name="FName" value="{{ old('FName') }}" required autocomplete="FName" autofocus>

                                @error('FName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('LName') is-invalid @enderror" name="LName" value="{{ old('LName') }}" required autocomplete="LName" autofocus>

                                @error('LName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NIC" class="col-md-4 col-form-label text-md-right">{{ __('National Identity Card Number') }}</label>

                            <div class="col-md-6">
                                <input id="NIC" type="string" class="form-control @error('NIC') is-invalid @enderror" name="NIC" value="{{ old('NIC') }}" required autocomplete="NIC">

                                @error('NIC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DOB" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="DOB" type="date" class="form-control @error('DOB') is-invalid @enderror" name="DOB" value="{{ old('DOB') }}" required autocomplete="DOB">

                                @error('DOB')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Qualification" class="col-md-4 col-form-label text-md-right">{{ __('Qualification') }}</label>

                            <div class="col-md-6">
                                <input id="Qualification" type="string" class="form-control @error('Qualification') is-invalid @enderror" name="Qualification" value="{{ old('Qualification') }}" required autocomplete="Qualification">

                                @error('Qualification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject_id" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <input id="subject_id" type="integer" class="form-control @error('subject_id') is-invalid @enderror" name="subject_id" value="{{ old('subject_id') }}" required autocomplete="subject_id">

                                @error('subject_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rate" class="col-md-4 col-form-label text-md-right">{{ __('Rate') }}</label>

                            <div class="col-md-6">
                                <input id="rate" type="integer" class="form-control @error('rate') is-invalid @enderror" name="rate" value="{{ old('rate') }}" required autocomplete="rate">

                                @error('rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referName" class="col-md-4 col-form-label text-md-right">{{ __('Refree Name') }}</label>

                            <div class="col-md-6">
                                <input id="referName" type="string" class="form-control @error('referName') is-invalid @enderror" name="referName" value="{{ old('referName') }}" required autocomplete="referName">

                                @error('referName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referStatus" class="col-md-4 col-form-label text-md-right">{{ __('Refree Status') }}</label>

                            <div class="col-md-6">
                                <input id="referStatus" type="string" class="form-control @error('referStatus') is-invalid @enderror" name="referStatus" value="{{ old('referStatus') }}" required autocomplete="referStatus">

                                @error('referStatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referEmail" class="col-md-4 col-form-label text-md-right">{{ __('Refree Email') }}</label>

                            <div class="col-md-6">
                                <input id="referEmail" type="string" class="form-control @error('referEmail') is-invalid @enderror" name="referEmail" value="{{ old('referEmail') }}" required autocomplete="referEmail">

                                @error('referEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referNumber" class="col-md-4 col-form-label text-md-right">{{ __('Refree Number') }}</label>

                            <div class="col-md-6">
                                <input id="referNumber" type="string" class="form-control @error('referNumber') is-invalid @enderror" name="referNumber" value="{{ old('referNumber') }}" required autocomplete="referNumber">

                                @error('referNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
