@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header"><h2>Announcements</h2></div>
                        <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($anns)>0)
                            @foreach($anns as $ann)
                                <div class="well">
                                    <h3>{{$ann->title}}</h3>
                                    {{$ann->announcement}}
                                    <br/>
                                    <small>Published on {{$ann->created_at}} by {{$ann->creator->FName}} {{$ann->creator->LName}}</small>
                                    <hr/>
                                </div>
                            @endforeach
                            {{$anns->links()}}
                        @else
                            <p>No announcements yet!</p>
                        @endif
                    </div>
                </div>
                {{-- <a href="{{route('student.viewTutors')}}" class="btn btn-primary" type="button">TUTORS LIST</a> --}}
                <style>
                    .grid-container {
                    display: grid;
                    justify-content: space-evenly;
                    grid-template-columns: 300px 300px 300px;/* Make the grid smaller than the container */
                    grid-gap: 10px;
                      /* background-color: #2196F3; */
                      /* padding: 10px; */
                    }
                    
                    .grid-container > div {
                    background-color: rgba(255, 255, 255, 0.8);
                    text-align: center;
                    padding: 35px ;
                    
                    }
                    
                    </style>

                <div class="grid-container pt-5">
                    <div>
                    {{-- <h1>STEP 1</h1> --}}
                    <a href="student/viewtutors/{{$tutor2[0]->id}}">
                        <img src="/assets/img/avatar/{{$tutor2[0]->user->avatar}}" height="100" >
                    </a>
                    <a href="student/viewtutors/{{$tutor2[0]->id}}">
                        <h1>{{$tutor2[0]->user->FName}} {{$tutor2[0]->user->LName}}</h1>
                    </a>
                    <p>Qualification : {{$tutor2[0]->Qualification}}</p>
                    </div>
                    
                    <div>
                    {{-- <h1>STEP 2</h1> --}}
                    <a href="student/viewtutors/{{$tutor1[0]->id}}">
                        <img src="assets/img/avatar/{{$tutor1[0]->user->avatar}}" width="100" height="100" >
                    </a>
                    <a href="student/viewtutors/{{$tutor1[0]->id}}">
                        <h1>{{$tutor1[0]->user->FName}} {{$tutor1[0]->user->LName}}</h1>
                    </a>
                    <p>Qualification : {{$tutor1[0]->Qualification}} </p>
                    </div>
                    
                    <div>
                    {{-- <h1>STEP 3</h1> --}}
                    <a href="student/viewtutors/{{$tutor3[0]->id}}">
                        <img src="assets/img/avatar/{{$tutor3[0]->user->avatar}}" width="100" height="100" >
                    </a>
                    <a href="student/viewtutors/{{$tutor3[0]->id}}">
                        <h1>{{$tutor3[0]->user->FName}} {{$tutor3[0]->user->LName}}</h1>
                    </a>
                    <p>Qualification : {{$tutor3[0]->Qualification}}</p>
                    </div>  
                    </div>
                    <div class="col text-center pt-3 ">
                        <a href="{{route('student.viewTutors')}}" type="button" class="col text-center btn btn-info" >View More</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection