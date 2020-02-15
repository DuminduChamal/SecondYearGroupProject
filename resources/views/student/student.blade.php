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
                <a href="{{route('student.viewTutors')}}" class="btn btn-primary" type="button">TUTORS LIST</a>
            </div>
        </div>
    </div>
</div>
@endsection