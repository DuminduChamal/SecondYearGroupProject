@extends('layouts.app')

@section('title')
    Tutorland
@endsection

@section('content')
<!-- Header -->

<div class="hero header py-7 py-lg-8" >
    <!-- <div class="pic"> -->
    <!-- <div class="hero"> -->
    <div class="container">
        <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <img src="assets/img/brand/brand.png" width="300" height="200">
                    <h1 class="text-white">Welcome!</h1>
                    <p class="text-lead text-light">Create account ! Start learning... Learn from the academic professionals,
anytime, anywhere</p>
                </div>  
        </div>
        <div>
        <style>
            .grid-container {
            display: grid;
            justify-content: space-evenly;
            grid-template-columns: 300px 300px 300px;/* Make the grid smaller than the container */
            grid-gap: 10px;
            /* background-color: #2196F3; */
            /* padding: 10px; */
            }

            .grid-container > div {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 35px ;
            
            }

        </style>

            <div class="grid-container">
                <div class="card rounded" style="opacity:0.7">
                    <h2>Matthew G.</h2>
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/tutor/mathew.jpg" class="rounded" style="border: solid 3px royalblue" width="100" height="100" >
                    </div>
                    <h1>ENGLISH</h1>
                    <p>6 Year(s) of experience</p>
                </div>

            <!-- <div class="grid-container"> -->
                <div class="card rounded" style="opacity:0.7">

                    <h2>Misbah M.</h2>
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/tutor/mishab.jpg" class="rounded" style="border: solid 3px royalblue" width="100" height="100" >
                    </div>
                    <h1>MATHEMATICS</h1>
                    <p>Computer Science, St Andrews University</p>
                </div>    
            <!-- </div> -->

            <div class="card rounded" style="opacity:0.7">
                    <h2>Henry C.</h2>
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/tutor/henry.jpg" class="rounded" style="border: solid 3px royalblue" width="100" height="100" >
                    </div>
                    <h1>SCIENCE</h1>
                    <p>Medicine, Liverpool University</p>
            
            </div>  
                
            </div>
        </div>
        </div>
    
    </div>




    
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
   

    <!-- <!DOCTYPE html>
<html>
<head>
	<title>Our Office</title> -->
	
	<!-- <script type="text/javascript" src="./loadMap.js"></script> -->
	
	<!-- <style type="text/css">
		.container {
			height: 400px;
		}
		#map {

			width: 35%;
			height: 50%;
			border: 1px solid red;
        }
	
    </style> -->
  
<!-- </head> -->


<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-lFGS9f5P9seokNpm7NHNBThS8xCo3oA&callback=loadMyMap">
</script>
 </div>
<script type="text/javascript" >
 function loadMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 36.9881, lng: 122.0582 },
        zoom: 12,
        center: map
        
    });
} 
</script>
-->

</div>


@endsection
