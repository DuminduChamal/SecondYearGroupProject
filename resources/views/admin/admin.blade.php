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
                        @if(count($anns)>0)
                            @foreach($anns as $ann)
                                <div class="well">
                                    <h3>{{$ann->title}}</h3>
                                    {{$ann->announcement}}
                                    <br/>
                                    <small>Published on {{$ann->created_at}} by {{$ann->creator->FName}} {{$ann->creator->LName}}</small><br>
                                    @if(Auth::user()->id==$ann->admin_id)
                                    <a href="{{route('admin.editAnnouncement',['ann'=>$ann->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{route('admin.deleteAnnouncement',['ann'=>$ann->id])}}" onclick="return confirm('Are you sure to remove {{$ann->title}}?')" class="btn btn-danger btn-sm">Delete</a>
                                    @endif
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