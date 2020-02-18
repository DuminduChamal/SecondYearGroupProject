@extends('layouts.app')

@section('title')
    {{$tutor->FName}}'s Profile
@endsection

@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(/assets/img/theme/tutor.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">{{$tutor->FName}} {{$tutor->LName}}</h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="/assets/img/avatar/{{$tutor->avatar}}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                        <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                <div>
                                    <span class="heading">{{$tutor->session}}</span>
                                    <span class="description">Successful Sessions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{$tutor->FName}} {{$tutor->LName}}
                        </h3>
                        <div class="h5 font-weight-300">
                                Current Rating
                              @if((Auth::user()->rating)=='1')
                                <fieldset class="rating">
                                  <div class="stars">
                                      <label for="demo-1" aria-label="1 star" title="1 star"></label>
                                  </div>
                                </fieldset>
                              @endif
                              @if((Auth::user()->rating)=='2')
                                <fieldset class="rating">
                                  <div class="stars">
                                      <label for="demo-1" aria-label="1 star" title="2 star"></label>
                                      <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                                  </div>
                                </fieldset>
                              @endif
                              @if((Auth::user()->rating)=='3')
                                <fieldset class="rating">
                                  <div class="stars">
                                      <label for="demo-1" aria-label="1 star" title="3 star"></label>
                                      <label for="demo-2" aria-label="2 stars" title="3 stars"></label>
                                      <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                                  </div>
                                </fieldset>
                              @endif
                              @if((Auth::user()->rating)=='4')
                                <fieldset class="rating">
                                  <div class="stars">
                                      <label for="demo-1" aria-label="1 star" title="4 star"></label>
                                      <label for="demo-2" aria-label="2 stars" title="4 stars"></label>
                                      <label for="demo-3" aria-label="3 stars" title="4 stars"></label>
                                      <label for="demo-4" aria-label="4 stars" title="4 stars"></label>   
                                  </div>
                                </fieldset>
                              @endif
                              @if((Auth::user()->rating)=='5')
                                <fieldset class="rating">
                                  <div class="stars">
                                      <label for="demo-1" aria-label="1 star" title="5 star"></label>
                                      <label for="demo-2" aria-label="2 stars" title="5 stars"></label>
                                      <label for="demo-3" aria-label="3 stars" title="5 stars"></label>
                                      <label for="demo-4" aria-label="4 stars" title="5 stars"></label>
                                      <label for="demo-5" aria-label="5 stars" title="5 stars"></label>   
                                  </div>
                                </fieldset>
                              @endif
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Subject - {{$tutor->tutor->subject->subject}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
        {{-- Remove button --}}
        <a type="button" class="btn btn-danger" onclick="return confirm('Are you sure to remove {{$tutor->FName}}?')" href="{{route('admin.removetutor',['tutor'=>$tutor->id])}}">Remove</a>
        <br/><br/>
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{$tutor->FName}}'s account</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="{{$tutor->FName}} {{$tutor->LName}}" value=""  readonly >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="{{$tutor->email}}" readonly >
                                    </div>user
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">First name</label>
                                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{$tutor->FName}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Last name</label>
                                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{$tutor->LName}}" readonly>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-DOB">Date of Birth</label>
                                    <input type="text" id="input-DOB" class="form-control form-control-alternative"  value="{{$tutor->DOB}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-NIC">National Identity Card Number</label>
                                    <input type="text" id="input-NIC" class="form-control form-control-alternative" value="{{$tutor->NIC}}" readonly>
                                </div>
                            </div>
                        </div>
                        </div>
                        <hr class="my-4" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection