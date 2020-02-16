@extends('layouts.app')

@section('title')
    About us
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
            <h1 class="text-white">About Us!</h1>
            <p class="text-lead text-light">Well experience, techy guys who solves commiunity problems</p>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
            <h1 class="text-white">MEET OUR TEAM</h1>
            <p class="text-white font-italic">We are all very different. We were born in different cities, at different times, we love different music, food, movies. But we have something that unites us all. It is our company. We are its heart. We are not just a team, we are a family. </p>
            </div>
        </div>
{{-- ///////////////////////////////////////////////// --}}
    
    

    
    {{-- <div class="container">
        <div class="media-container-row">

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-users" style="color: rgb(0, 0, 0);" media-simple="true"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5">
                        Creativity</h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                        It's the ability to think outside the box. We make decisions, create something new and generate a lot of ideas.
                    </p>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-globe" style="color: rgb(0, 0, 0);" media-simple="true"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5">
                        Worldwide</h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Tutorland platform can be accessed by any body anywhere in the world
                    </p>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-smile-face" style="color: rgb(0, 0, 0);" media-simple="true"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5">
                        Unique Styles
                    </h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Tutorland offers lots of unique functions to our users both tutors and students
                    </p>
                </div>
            </div>
            
        </div>
    </div> --}}

    <br>

        <div class="header bg-gradient-primary">

        <div class="row-100 card-title">
            <h1 class="text-white font-bold"> The Team </h1>
        </div>

        <div class="card">
            <div class="row">
            <div class="col-sm-3 col-md-6 col-lg-4">
                <img src="/assets/img/team/dumi.jpg" alt="dumi" class="row-25" style="width:50% ">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-8">

                <h1>Dumindu Chamal</h1>
                <p class="title">BSc Information Systems (Reading)</p>
                <p>University of Colombo School of Computing</p>
                
                <p><button>Contact</button></p>
            </div>
            </div>
        </div>

        <br/> <br/>
        <div class="card">
            <div class="row">
            <div class="col-sm-3 col-md-6 col-lg-4">
                <img src="/assets/img/team/bavindu.jpg" alt="dumi" class="row-25" style="width:50% ">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-8">

                <h1>Bavindu Dilshan</h1>
                <p class="title">BSc Information Systems (Reading)</p>
                <p>University of Colombo School of Computing</p>
                
                <p><button>Contact</button></p>
            </div>
            </div>
        </div>
    <br/> <br/>
    <div class="card">
        <div class="row">
        <div class="col-sm-3 col-md-6 col-lg-4">
            <img src="/assets/img/team/minura.jpg" alt="dumi" class="row-25" style="width:50% ">
        </div>
        <div class="col-sm-9 col-md-6 col-lg-8">

            <h1>Minura Pabasara</h1>
            <p class="title">BSc Information Systems (Reading)</p>
            <p>University of Colombo School of Computing</p>
            
            <p><button>Contact</button></p>
        </div>
        </div>
    </div>

        <br/> <br/>
        <div class="card">
            <div class="row">
            <div class="col-sm-3 col-md-6 col-lg-4">
                <img src="/assets/img/team/manuja.jpg" alt="dumi" class="row-25" style="width:50% ">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-8 text-white">

                <h1>Manuja Pasyala</h1>
                <p class="title">BSc Information Systems (Reading)</p>
                <p>University of Colombo School of Computing</p>
                
                <p><button>Contact</button></p>
            </div>
            </div>
        </div>
        </div>
            {{-- <div class="card">
                <img src="images/bhagya.jpg" alt="bhagya" style="width:100%">
                <h1> Bhagya Kumaranayake </h1>
                <p class="title">BSc of Information Systems (Reading)</p>
                <p>University of Colombo School of Computing</p>

            <p><button>Contact</button></p>
            </div> --}}




{{-- ////////////////////////////////////////////////// --}}
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

@endsection