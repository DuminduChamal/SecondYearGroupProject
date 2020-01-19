@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
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
                                    <small>Written on {{$ann->created_at}}</small>
                                    <hr/>
                                </div>
                            @endforeach
                            {{$anns->links()}}
                        @else
                            <p>No announcements yet!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection