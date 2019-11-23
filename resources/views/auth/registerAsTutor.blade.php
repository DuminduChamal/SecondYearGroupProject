@extends('layouts.app')

@section('title')
    Tutor Registration
@endsection

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
            <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text mb-4">
                sign up with credentials
            </div>
            <form role="form" method="POST" action="{{ route('student.register.tutor') }}">
                @csrf
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <label id="FName" class="form-control" name="FName">{{Auth::user()->FName}}</label>
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <label id="LName" class="form-control" name="LName">{{Auth::user()->LName}}</label>
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <label id="email" class="form-control" name="email">{{Auth::user()->email}}</label>
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                <label id="DOB" class="form-control" name="DOB">{{Auth::user()->DOB}}</label>
                </div>
                </div>
                <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-support-16"></i></span>
                    </div>
                    @if(Auth::user()->NIC=='')
                        <input id="NIC" type="text" placeholder="National Identity Card" class="form-control @error('NIC') is-invalid @enderror" name="NIC" value="{{ old('NIC') }}" required autocomplete="NIC" autofocus>
                        @error('NIC')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @else
                        <label id="NIC" class="form-control" name="NIC">{{Auth::user()->NIC}}</label>
                    @endif
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
                {{-- <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
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
                </div>
                </div> --}}
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
                <button type="submit" class="btn btn-primary mt-4">Sign Up as Tutor also</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection