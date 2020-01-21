    @extends('layouts.app')

    @section('title')
        Contact US
    @endsection

    @section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
            <h1 class="text-white">Contact Us!</h1>
            <p class="text-lead text-light">Use these awesome forms to CONTACT US. It's totally free....</p>
            </div>
        </div>
        {{-- Thank you respose --}}
            @if (session()->has('messege'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{session()->get('messege')}}
            </div>
            @endif
        {{-- form contact us --}}
        @if (! session()->has('messege'))
            <form action="contact" method="POST" class="col-lg-5 center">
            <div class="form-group row">
                <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                </div>
                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input id="email" type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            </div>
            <div class="form-group row">
            <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                </div>
            {{-- <input id="messege" type="text" placeholder="Messege" class="form-control @error('messege') is-invalid @enderror" name="messege" value="{{ old('messege')}}" required autocomplete="messege" autofocus>
            @error('messege')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
                <textarea name="messege" id="messege" type="text" cols="50" rows="10" placeholder="Your Messege" class="form-control @error('messege') is-invalid @enderror" ></textarea>
                @error('messege')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            </div>
            @csrf
            <button type="submit" class="btn btn-default">send messege</button>
        </form>
        @endif
            {{-- End of form --}}
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
    </div>
    @endsection