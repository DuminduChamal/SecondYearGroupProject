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
                <p class="text-white">6. Paste it in the given text box and Submit</p>
                <p class="text-white">7. Please wait he will get join the video in a short time.</p>
                <a class="btn btn-info" href="#" data-toggle='modal' data-target='#staticBackdrop'>Rate {{$stu->FName}}!</a>
                {{-- <a href="{{route('tutor.rate.student',['id'=>$stu->id])}}">Click here to rate </a> --}}
                {{-- Rate Modal --}}
                <form role="form" id="better-rating-form" method="POST" action="{{route('tutor.rate.student',['id'=>$stu->id])}}">
                    @csrf
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="staticBackdropLabel">Rate {{$stu->FName}}</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">   
                            <fieldset class="rating">
                            
                                <input id="demo-1" type="radio" name="demo" value="1"> 
                                <label for="demo-1">1 star</label>
                                <input id="demo-2" type="radio" name="demo" value="2">
                                <label for="demo-2">2 stars</label>
                                <input id="demo-3" type="radio" name="demo" value="3">
                                <label for="demo-3">3 stars</label>
                                <input id="demo-4" type="radio" name="demo" value="4">
                                <label for="demo-4">4 stars</label>
                                <input id="demo-5" type="radio" name="demo" value="5">
                                <label for="demo-5">5 stars</label>
                                
                                <div class="stars">
                                    <label for="demo-1" onClick="rat(1)" aria-label="1 star" title="1 star"></label>
                                    <label for="demo-2" onClick="rat(2)" aria-label="2 stars" title="2 stars"></label>
                                    <label for="demo-3" onClick="rat(3)" aria-label="3 stars" title="3 stars"></label>
                                    <label for="demo-4" onClick="rat(4)" aria-label="4 stars" title="4 stars"></label>
                                    <label for="demo-5" onClick="rat(5)" aria-label="5 stars" title="5 stars"></label>   
                                </div>
                                
                            </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Rate</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    </form>
                    {{-- End of Rate Modal --}}
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