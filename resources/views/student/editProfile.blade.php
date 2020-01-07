@extends('layouts.app');

@section('title')
    Edit my profile
@endsection

@section('content')
<div>
        <div class="main-content">
            <!-- End Navbar -->
            <!-- Header -->
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/student.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello {{Auth::user()->FName}}</h1>
                    <p class="text-white mt-0 mb-5">This is your profile details. You can edit your stuff....</p>
                    <div class="row">
                    <a href="" class="btn btn-info">Update profile</a> 
                    {{-- {{route('student.editProfile',['user'=>Auth::user()->id])}} --}}
                    {{-- <a href="/projectLaravel/public/home/" onclick="return confirm('Are you Sure to DELETE profile ?')" class="btn btn-danger">Delete profile</a> --}}
                    <div>
                        {{-- <form action="{{route('student.delete',['user'=>Auth::user()->id])}}" method="POST"> --}}
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you Sure to DELETE profile ?')">DELETE Profile</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Page content -->
            <div class="container-fluid mt--7">
            
        </div>
        </body>
    </div>
    @endsection