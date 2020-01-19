@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Announcements</b></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ route('admin.announcement.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Announcement Title</label>
                                <input name="title" class="form-control @error('title') is-invalid @enderror" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="announcement">Announcement</label>
                                <textarea name="annouce" class="form-control @error('annouce') is-invalid @enderror" required rows="4"></textarea>
                                @error('annouce')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection