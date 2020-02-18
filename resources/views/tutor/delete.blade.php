@extends('layouts.app')

@section('title')
    Delete Account
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>{{ __('Delete you account from TUTORLAND') }}</strong></div>
    
                    <div class="card-body">
                        {{ __('Before proceeding further more, please mind that after deletion you won\'t be able to reactivate the account.') }}
                        {{ __('If you really wish to delete account from Tutorland, Click below button.') }}<br/><br/><a onclick="return confirm('Are you sure to delete your account?')" href="{{route('tutor.deleteConfirm',['user'=>Auth::user()->id])}}" class="btn btn-danger">Delete Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection