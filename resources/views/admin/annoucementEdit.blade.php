@extends('layouts.app')

@section('title')
    Edit Announcement
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Announcements</b></div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('admin.announcement.edit',['ann'=>$editann->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Announcement Title</label>
                                <input name="title" class="form-control @error('title') is-invalid @enderror" value="{{$editann->title}}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="announcement">Announcement</label>
                                <textarea name="announcement" class="form-control @error('announcement') is-invalid @enderror" placeholder="{{$editann->announcement}}"  rows="4"></textarea>
                                @error('announcement')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection