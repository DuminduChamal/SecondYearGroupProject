@extends('layouts.app')

@section('title')
    Tutor Payment
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
                    {{-- <div class="card-header">{{ __('Tutor Payment') }}</div> --}}
    
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Payment Success') }}
                            </div>
                        @endif
    
                        {{--Payement form--}}
                        <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{ route('payment',['tutor'=>$tutor->id])}}">
                            {{ csrf_field() }}
                            <h2 class="w3-text-blue">Payment Form</h2>
                            <p>Your tutor has been accepted your requested timeslot with your tutor <strong>{{$tutor->user->FName}} {{$tutor->user->LName}}</strong>. Please do the payment to proceed further for the session</p>
                            <p>      
                            <label class="w3-text-blue"><b>Amount for the session :</b></label>
                            <label class="w3-text-blue"><h3>USD {{$tutor->rate}}</h3></label></p>    
                            <button onclick="return confirm('Are you sure to proceed payment with PayPal USD {{$tutor->rate}}?')" type="submit" class="btn btn-warning">Pay with PayPal</button></p>
                        </form>
                        {{--Payement form end--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

