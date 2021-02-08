@extends('layouts.app')

@section('title')
  {{$tutor->user->FName}}'s Profile
@endsection

@section('content')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(/assets/img/theme/tutor.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">{{$tutor->user->FName}}'s Profile</h1>
          <p class="text-white mt-0 mb-5">This is {{$tutor->user->FName}}'s profile page. You can see {{$tutor->user->FName}}'s details and available time slots for the sessions. Reserve a time slot for your session from below button.</p>
          {{-- <a href="{{route('tutor.editProfile',['user'=>Auth::user()->id])}}" class="btn btn-info">Edit profile</a> --}}
          <a class="btn btn-info" href="#" data-toggle='modal' data-target='#retModal'>Available Timeslots</a>
        {{-- <a href="{{route('student.viewTimeSlots')}}">details</a> --}}
        {{-- <a href="{{$tutor->id}}/timeslots">details</a> --}}
        
        <a class="btn btn-info" href="#" data-toggle='modal' data-target='#staticBackdrop'>Rate</a>
        {{-- Rate Modal --}}
        <form role="form" id="better-rating-form" method="POST" action="{{ route('rateSubmit',['tutor'=>$tutor->user->id])}}">
        @csrf
         <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="staticBackdropLabel">Rate {{$tutor->user->FName}}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">   
                  <fieldset class="rating">
                  
                    <input id="demo-1" type="radio" name="demo" value="1"> 
                    <label for="demo-1">1 star</label>
                    <input id="demo-2" type="radio" name="demo" value="2">
                    <label for="demo-2">2 stars</label>
                    <input id="demo-3" type="radio" name="demo" value="3">
                    <label for="demo-3">3 stars</label>
                    <input id="demo-4" type="radio" name="demo" value="4">
                    <label for="demo-4">4 stars</label>
                    <input id="demo-5" type="radio" name="demo" value="5">
                    <label for="demo-5">5 stars</label>
                    
                    <div class="stars">
                        <label for="demo-1" onClick="rat(1)" aria-label="1 star" title="1 star"></label>
                        <label for="demo-2" onClick="rat(2)" aria-label="2 stars" title="2 stars"></label>
                        <label for="demo-3" onClick="rat(3)" aria-label="3 stars" title="3 stars"></label>
                        <label for="demo-4" onClick="rat(4)" aria-label="4 stars" title="4 stars"></label>
                        <label for="demo-5" onClick="rat(5)" aria-label="5 stars" title="5 stars"></label>   
                    </div>
                    
                </fieldset>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onClick="rateSubmit()">Rate</button>
              </div>
            </div>
          </div>
        </div>
        </form>
        {{-- End of Rate Modal --}}
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row" >
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="/assets/img/avatar/{{$tutor->user->avatar}}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              {{-- <a href="skype:live:bavindu96?call" class="btn btn-sm btn-info mr-4">Connect</a>  
              <a href="skype:live:bavindu96?chat" class="btn btn-sm btn-default float-right">Message</a> --}}
            </div>
          </div>
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div>
                <br/><br/><br/>
                {{-- success messeges --}}
                <div class="col">
                    @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                    @endif
                    @if (session('error'))
                      <div class="alert alert-danger" role="alert">
                          {{ session('error') }}
                      </div>
                    @endif
                </div>
              </div>
              <hr>
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <div>
                    <span class="heading"><h1>{{$tutor->user->session}}</h1></span>
                    <span class="description">Successful Participated Sessions</span>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />
            <div class="text-center">
              <h3>
                  {{$tutor->user->FName}} {{$tutor->user->LName}}'s Overall Rating
              </h3>
              <div class="h5 font-weight-300">
                @if(($tutor->user->rating)=='1')
                  <fieldset class="rating">
                    <div class="stars">
                        <label for="demo-1" aria-label="1 star" title="1 star"></label>
                    </div>
                  </fieldset>
                @endif
                @if(($tutor->user->rating)=='2')
                  <fieldset class="rating">
                    <div class="stars">
                        <label for="demo-1" aria-label="1 star" title="2 star"></label>
                        <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                    </div>
                  </fieldset>
                @endif
                @if(($tutor->user->rating)=='3')
                  <fieldset class="rating">
                    <div class="stars">
                        <label for="demo-1" aria-label="1 star" title="3 star"></label>
                        <label for="demo-2" aria-label="2 stars" title="3 stars"></label>
                        <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                    </div>
                  </fieldset>
                @endif
                @if(($tutor->user->rating)=='4')
                  <fieldset class="rating">
                    <div class="stars">
                        <label for="demo-1" aria-label="1 star" title="4 star"></label>
                        <label for="demo-2" aria-label="2 stars" title="4 stars"></label>
                        <label for="demo-3" aria-label="3 stars" title="4 stars"></label>
                        <label for="demo-4" aria-label="4 stars" title="4 stars"></label>   
                    </div>
                  </fieldset>
                @endif
                @if(($tutor->user->rating)=='5')
                  <fieldset class="rating">
                    <div class="stars">
                        <label for="demo-1" aria-label="1 star" title="5 star"></label>
                        <label for="demo-2" aria-label="2 stars" title="5 stars"></label>
                        <label for="demo-3" aria-label="3 stars" title="5 stars"></label>
                        <label for="demo-4" aria-label="4 stars" title="5 stars"></label>
                        <label for="demo-5" aria-label="5 stars" title="5 stars"></label>   
                    </div>
                  </fieldset>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{$tutor->user->FName}} {{$tutor->user->LName}}'s Profile</h3>
              </div>
              <div class="col-4 text-right">
                {{-- <a href="#!" class="btn btn-sm btn-primary">Settings</a> --}}
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
                <h6 class="heading-small text-muted mb-4">Tutor information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Full Name</label>
                                    <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="{{$tutor->user->FName}} {{$tutor->user->LName}}" value="{{$tutor->user->FName}} {{$tutor->user->LName}}"  readonly >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email address</label>
                                    <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="{{$tutor->user->email}}" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">First name</label>
                                    <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{$tutor->user->FName}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Last name</label>
                                    <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{$tutor->user->LName}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="input-first-name">Subject</label>
                                  <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{$tutor->subject->subject}}" readonly>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="form-control-label" for="input-last-name">Free space</label>
                                  <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Any new content" value="" readonly>
                              </div>
                          </div>
                      </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-DOB">Date of Birth</label>
                                    <input type="text" id="input-DOB" class="form-control form-control-alternative"  value="{{$tutor->user->DOB}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-NIC">National Identity Card Number</label>
                                    <input type="text" id="input-NIC" class="form-control form-control-alternative" value="{{$tutor->user->NIC}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                </form>
            </div>
        </div>
    </div>
</div>
</div>
{{--timeslot modal --}}
<div class="modal fade" id="retModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
      
          <!-- Modal Header -->
          <div class="modal-header" style="outline-offset: -13px;
                                      padding: 30px;
                                      background: #6819e8;
                                      background: -moz-linear-gradient(left, #6819e8 0%, #7437d0 35%, #615fde 68%, #6980f2 100%);
                                      background: -webkit-linear-gradient(left, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                      background: linear-gradient(to right, #6819e8 0%,#7437d0 35%,#615fde 68%,#6980f2 100%);
                                      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6819e8', endColorstr='#6980f2',GradientType=1 );">
          <h4 class="modal-title" style="color: #FFFFFF;">Time shedule</h4>
          <button type="button" class="close" data-dismiss="modal" style="margin-top: -45px;margin-right: -40px;">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
              <h1>select slots</h1>
              <p>Here you can see the available time slots for</p>
              <p id="modelnote"></p>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>
                    <th scope="col">Saturday</th>
                    <th scope="col">Sunday</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">8-10 AM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_08" onclick="select('Monday_08')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_08" onclick="select('Tuesday_08')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Wednesday_08" onclick="select('Wednesday_08')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_08" onclick="select('Thursday_08')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_08" onclick="select('Friday_08')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_08" onclick="select('Saturday_08')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_08" onclick="select('Sunday_08')" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">10-12 AM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_10"  onclick="select('Monday_10')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_10" onclick="select('Tuesday_10')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Wednesday_10" onclick="select('Wednesday_10')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_10" onclick="select('Thursday_10')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_10" onclick="select('Friday_10')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_10" onclick="select('Saturday_10')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_10" onclick="select('Sunday_10')" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">12-2 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_12" onclick="select('Monday_12')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_12" onclick="select('Tuesday_12')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Wednesday_12" onclick="select('Wednesday_12')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_12" onclick="select('Thursday_12')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_12" onclick="select('Friday_12')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_12" onclick="select('Saturday_12')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_12" onclick="select('Sunday_12')" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">2-4 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_02" onclick="select('Monday_02')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_02" onclick="select('Tuesday_02')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Wednesday_02" onclick="select('Wednesday_02')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_02" onclick="select('Thursday_02')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_02" onclick="select('Friday_02')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_02" onclick="select('Saturday_02')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_02" onclick="select('Sunday_02')" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">4-6 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_04" onclick="select('Monday_04')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_04" onclick="select('Tuesday_04')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Wednesday_04" onclick="select('Wednesday_04')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_04" onclick="select('Thursday_04')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_04" onclick="select('Friday_04')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_04" onclick="select('Saturday_04')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_04" onclick="select('Sunday_04')" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">6-8 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_06" onclick="select('Monday_06')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_06" onclick="select('Tuesday_06')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Wednesday_06" onclick="select('Wednesday_06')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_06" onclick="select('Thursday_06')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_06" onclick="select('Friday_06')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_06" onclick="select('Saturday_06')" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_06" onclick="select('Sunday_06')" class="btn btn-block">Select</button></td>
                  </tr>
                </tbody>
              </table>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style ="display:none" id='submit' onClick="submit()" data-dismiss="modal">Submit</button>
          <button type="button" class="btn btn-secondary" style ="display:none" id='rmsubmit' onClick="rmsubmit()" data-dismiss="modal">remove</button>
          <button type="button" class="btn btn-secondary" onClick="cls()" data-dismiss="modal">Close</button>
          </div>
          
      </div>
  </div>
</div>
<?php $id =  Auth::user()->id;?>

{{-- Rating script --}}
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  var rate = '';
  function rat(params){
    rate = params;
    console.log(rate);
  }

  function rateSubmit() {
    console.log('submit')
    $.ajax({
    type: "POST",
    data:{ 'data': JSON.stringify(rate), '_token':'<?=csrf_token()?>'},
    url: "/student/viewtutors/{{$tutor->user->id}}/ratesubmit",
    // dataType: "json",
    success: function(JSONObject) {
      console.log('Success');
      document.open();
      document.write(JSONObject);
      document.close();
    },
    error: function(err) {
      console.log(err);
    }
  });
  console.log('rate done')
  }

</script>
{{-- script for timeslot --}}
<script>
  var selected = [];
  var remove = [];
  function datetime() {
    var data = <?php echo json_encode($time_slots);?>;
    console.log('arraytype testing');
    console.log(data);
    var date = ''
    var time = ''
    var date_time = ''
    var stuId = ''
    data.map((obj,i)=>{
      date = obj.day.toString();
      time = obj.time.split(':')[0].toString();
      stuId = obj.stu_id;
      userId = <?php echo $id;?>;
      date_time = date+'_'+time;
      var btn = document.getElementById(date_time);
      if(stuId === userId)
      {
        var upt = "removea('"+date_time+"')"
        btn.innerHTML = 'Remove'
        btn.setAttribute('class','btn btn-primary')
        btn.setAttribute('onClick',upt)
      }
      else{
        btn.innerHTML = 'Reserved'
        btn.setAttribute('class','btn btn-warning')
        btn.setAttribute('disabled',true)
      }
    })
  }
  function select(params) {
    note = document.getElementById('modelnote');
    note.innerHTML = 'Please click Submit button to confirm!'
    var rmv = "unselect('"+params+"')"
    var btn = document.getElementById(params);
    btn.innerHTML = 'Selected'
    btn.setAttribute('class','btn btn-primary')
    btn.setAttribute('onClick',rmv)
    date_time = params.split('_');
    date = date_time[0];
    time = date_time[1]+':00:00';
    obj = {
      day:date,
      time:time
    }
    sbtn = document.getElementById('submit');
    sbtn.style.display = ''
    rmbtn = document.getElementById('rmsubmit');
    rmbtn.style.display = 'none'
    selected.push(obj);
    console.log(selected)
  }
  function unselect(params) {
    note = document.getElementById('modelnote');
    note.innerHTML = ''
    var slct = "select('"+params+"')";
    var btn = document.getElementById(params);
    btn.innerHTML = 'Select'
    btn.setAttribute('class','btn btn-block')
    btn.setAttribute('onClick',slct)
    date_time = params.split('_');
    date = date_time[0];
    time = date_time[1]+':00:00';
    new_array =  selected.filter(function(obj){
        var dt = obj.day+'_'+obj.time.split(':')[0];
        return (dt.localeCompare(params));
      });
    selected = new_array;
    console.log(selected)
  }
  function submit() {
    console.log('hello')
    $.ajax({
    type: "POST",
    data:{ 'data': JSON.stringify(selected), '_token':'<?=csrf_token()?>'},
    url: "/student/viewtutors/{{$tutor->id}}/approve",
    // dataType: "json",
    success: function(JSONObject) {
      console.log('Success');
      location.reload();
      // document.open();
      // document.write(JSONObject);
      // document.close();
    },
    error: function(err) {
      console.log('Error');
      // let w=window.open('about:blank');
      // w.document.open();
      // w.document.write(err.responseText);
      // w.document.close();
    }
  });
  }
  function removea(params) {
    note = document.getElementById('modelnote');
    note.innerHTML = 'Please click remove button in below for confirm!';
    var slct = "select('"+params+"')";
    var btn = document.getElementById(params);
    btn.innerHTML = 'Select'
    btn.setAttribute('class','btn btn-block')
    btn.setAttribute('onClick',slct)
    date_time = params.split('_');
    date = date_time[0];
    time = date_time[1]+':00:00';
    obj = {
      day:date,
      time:time
    }
    rmbtn = document.getElementById('rmsubmit');
    rmbtn.style.display = ''
    sbtn = document.getElementById('submit');
    sbtn.style.display = 'none'
    remove.push(obj);
    console.log(remove)

  }

  function rmsubmit() {
    $.ajax({
    type: "POST",
    data:{ 'data': JSON.stringify(remove), '_token':'<?=csrf_token()?>'},
    url: "/student/viewtutors/{{$tutor->id}}/remove",
    // dataType: "json",
    success: function(JSONObject) {
      console.log('Success');
      location.reload();
      // document.open();
      // document.write(JSONObject);
      // document.close();
    },
    error: function(err) {
      console.log('Error');
      // let w=window.open('about:blank');
      // w.document.open();
      // w.document.write(err.responseText);
      // w.document.close();
    }
  });
  }
  function cls() {
    console.log('hello');
    location.reload();
  }
  datetime();
</script>
@endsection