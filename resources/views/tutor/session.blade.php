@extends('layouts.app')

@section('title')
    Live session
@endsection

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" >
        <div class="container-fluid d-flex align-items-center">
            <div class="container">
                <h2 class="text-white">Please paste the video session link in the given text box</h2>
                <p class="text-white">Follow below steps</p>
                <p class="text-white">1. Follow <a href="https://meet.google.com/_meet?utm_campaign=DonanimHaber&utm_medium=referral&authuser=1&utm_source=DonanimHaber" target="_blank"> this</a> link</p>
                <p class="text-white">2. Join or start a meeting</p>
                <p class="text-white">3. Enter any name and continue</p>
                <p class="text-white">4. Click Join meeting</p>
                <p class="text-white">5. Copy joining info</p>
                <p class="text-white">6. Paste it in the given text box</p>

                <a href="{{route('tutor.room.details')}}">get user</a>
            </div>
        </div>
        <div class="container">
            @if (session()->has('messege'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{session()->get('messege')}}
            </div>
            @endif

            @if (! session()->has('messege'))
            <form action="{{route('link.submit',['id'=>$stu->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Paste the link here</label>
                    <input id="link" type="text" name="link" class="form-control"placeholder="Enter the link">
                    <small id="linkHelp" class="form-text text-muted">Don't share your link with anyone else.</small>
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> --}}
                {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                </div> --}}
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endif

        </div>
    </div>
@endsection