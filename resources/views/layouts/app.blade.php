<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- setting a custom title --}}
    <title>
        @yield('title','Tutorland')
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Rating -->
    <style type="text/css">
        .rating input[type="radio"]:not(:nth-of-type(0)) {
            /* hide visually */    
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
        .rating [type="radio"]:not(:nth-of-type(0)) + label {
            display: none;
        }
        
        label[for]:hover {
            cursor: pointer;
        }
        
        .rating .stars label:before {
            content: "★";
        }
        
        .stars label {
            color: lightgray;
            font-size: 40px;
        }
        
        .stars label:hover {
            text-shadow: 0 0 1px #000;
        }
        
        .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
        .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
        .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
        .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
        .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
            color: orange;
        }
        
        .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
        .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
        .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
        .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
        .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
            color: darkorange;
        }
    </style>



    {{-- <link rel="stylesheet" href="{{ asset('css/rating.css') }}"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">     --}}
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/rating.js') }}"></script>  --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{asset('assets/css/argon-dashboard.css?v=1.1.0')}}" rel="stylesheet" />  
</head>
<body class="bg-default">
        @if(Request::is('admin')||Request::is('admin/*'))
            @include('inc.adminpanel')
        @endif
    <div class="main-content">
        @include('inc.navbar')
        @yield('content')
        @include('inc.footer')
    </div>
    <!--   Core   -->
    <script src="{{asset('assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    {{-- <script src="{{asset('assets/js/argon-dashboard.min.js?v=1.1.0')}}"></script> --}}
</body>
</html>