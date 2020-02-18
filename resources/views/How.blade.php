@extends('layouts.app')

@section('title')
    Tutorland
@endsection

@section('content')
<!-- Header -->

<div class=" py-6 py-lg-7" >
<!-- <div class="container p-3 my-5 bg-primary text-white"> -->
    <!-- <div class="pic"> -->
    <!-- <div class="hero"> -->
    <div class="container">
        <div class="header-body text-center mb-3">
        <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <img src="assets/img/brand/brand.png" width="250" height="150">
                    <h1 class="text-white">Welcome!</h1>
                    <p class="text-lead text-light">Start Learning Now!</p>
                </div>  
        </div>
        </div>

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
<div>
  <h1>STEP 1</h1>
  <img src="assets/img/signup.png" width="100" height="100" >
  <h1>Sign Up for free</h1>
  <p>Sign Up within less than one minute</p>
</div>

<div>
  <h1>STEP 2</h1>
  <img src="assets/img/tutor.png" width="100" height="100" >
  <h1>Choose a Tutor</h1>
  <p>From the best academic performers in the country</p>
</div>

<div><h1>STEP 3</h1>
<img src="assets/img/book.png" width="100" height="100" >
<h1>Pick a time Slot</h1>
<p>At your convenience – at any time of the day</p>
</div>  
    
</div>

@endsection






   
