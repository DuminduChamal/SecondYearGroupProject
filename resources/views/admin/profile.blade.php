@extends('layouts.app')

@section('title')
    My Profile
@endsection

@section('content')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(/assets/img/theme/admin.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white">Hello {{Auth::user()->FName}}</h1>
        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
      </div>
    </div>
  </div>
</div>
  <!-- Page content -->
<div class="container px-0">     
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="container-fluid">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">My Profile</h3>
              </div>
              {{-- <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
              </div> --}}
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Full Name</label>
                      <div class="alert alert-info">{{Auth::user()->FName}} {{Auth::user()->LName}}</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <div class="alert alert-info">{{Auth::user()->email}}</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">First name</label>
                      <div class="alert alert-info">{{Auth::user()->FName}}</div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Last name</label>
                      <div class="alert alert-info">{{Auth::user()->LName}}</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Date of Birth</label>
                        <div class="alert alert-info">{{Auth::user()->DOB}}</div>
                        </div>
                    </div>
                    @if(Auth::user()->NIC!='')
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-last-name">National Identity Card Number</label>
                        <div class="alert alert-info">{{Auth::user()->NIC}}</div>
                        </div>
                    </div>
                    @endif
                    </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>
 
@endsection