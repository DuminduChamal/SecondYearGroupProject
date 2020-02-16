@extends('layouts.app')

@section('title')
    Edit profile
@endsection

@section('content')
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../../assets/img/theme/edit.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-15 col-md-12">
          <h1 class="display-2 text-white">Hello {{Auth::user()->FName}}</h1>
          <p class="text-white mt-0 mb-5">Edit your Profile here</p>
          {{-- <a href="/projectLaravel/public/tutor/{{Auth::user()->id}}/edit" class="btn btn-info">Edit profile</a> --}}
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">My account</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
              <form enctype="multipart/form-data" action="{{route('tutor.updatePicture',['user'=>Auth::user()->id])}}" method="POST">
                <label>Update Your Profile Picture(2MB max)</label><br/>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
              </form>
              <hr style="height:1px;border:none;color:#333;background-color:#333;"/>
              <form action="{{route('tutor.updateDetails',['user'=>Auth::user()->id])}}" method="POST" class="pb-5">                         
                @method('PATCH')
                <h6 class="heading-small text-muted mb-4">User information</h6>
                {{-- @include('inc.user-form-edit') --}}
                @csrf
                <div class="form-group row">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                        </div>
                        <input id="FName" type="text" placeholder="First Name" class="form-control @error('FName') is-invalid @enderror" name="FName" value="{{ old('FName') ?? Auth::user()->FName}}" required autocomplete="Fname" autofocus>
                        @error('FName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                        </div>
                        <input input id="LName" placeholder="Last Name" type="text" class="form-control @error('LName') is-invalid @enderror" name="LName" value="{{ old('LName') ?? Auth::user()->LName }}" required autocomplete="name" autofocus>
                        @error('LName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input id="email" type="email" placeholder="Email Adress" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                <div class="form-group row">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input id="DOB" type="ext" placeholder="Date of Birth" class="form-control @error('DOB') is-invalid @enderror" name="DOB" value="{{ old('DOB') ?? Auth::user()->DOB }}" required autocomplete="DOB">
                        @error('DOB')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input id="NIC" type="text" placeholder="National Identity Card" class="form-control @error('NIC') is-invalid @enderror" name="NIC" value="{{ old('NIC') ?? Auth::user()->NIC }}" required autocomplete="NIC">
                        @error('NIC')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" onclick="return confirm('Are you sure to update your details ?')" class="btn btn-primary">update details</button>           
                <hr class="my-4" />
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection