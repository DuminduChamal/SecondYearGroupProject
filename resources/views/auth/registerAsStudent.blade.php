@extends('layouts.app')

@section('title')
    Student Registration
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
            <form role="form" method="POST" action="{{ route('tutor.register.student') }}">
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
                <label id="NIC" class="form-control" name="NIC">{{Auth::user()->NIC}}</label>
                </div>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Sign Up as Student also</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection