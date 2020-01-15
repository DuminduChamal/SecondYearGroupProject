@extends('layouts.app')

@section('content')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(/assets/img/theme/tutor.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">{{$tutor->user->FName}}'s Profile</h1>
          <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
          {{-- <a href="{{route('tutor.editProfile',['user'=>Auth::user()->id])}}" class="btn btn-info">Edit profile</a> --}}
          <a class="btn btn-info" href="#" data-toggle='modal' data-target='#retModal'>View My</a>
        {{-- <a href="{{route('student.viewTimeSlots')}}">details</a> --}}
        <a href="{{$tutor->id}}/timeslots">details</a>
        
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
                  <img src="/assets/img/avatar/tutors/{{$tutor->user->avatar}}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
              <a href="#" class="btn btn-sm btn-default float-right">Message</a>
            </div>
          </div>
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div>
                <br/><br/>
                {{-- success messege when profile picture updated --}}
                <div>
                    @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                    @endif
                </div>
                  {{-- <form enctype="multipart/form-data" action="{{route('tutor.updatePicture',['user'=>Auth::user()->id])}}" method="POST">
                    <label>Update Your Profile Picture(2MB max)</label><br/>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class= "btn btn-sm btn-primary" disabled>
                  </form> --}}
                </div>
                <hr/>
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <div>
                    <span class="heading">22</span>
                    <span class="description">Friends</span>
                  </div>
                  <div>
                    <span class="heading">10</span>
                    <span class="description">Photos</span>
                  </div>
                  <div>
                    <span class="heading">89</span>
                    <span class="description">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3>
                  {{$tutor->FName}}<span class="font-weight-light">, 27</span>
              </h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>Bucharest, Romania
              </div>
              <hr class="my-4" />
              <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
              <a href="#">Show more</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">My account</h3>
              </div>
              <div class="col-4 text-right">
                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Username</label>
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
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Address</label>
                                    <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">City</label>
                                    <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Country</label>
                                    <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Postal code</label>
                                    <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">About me</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label>About Me</label>
                            <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
{{-- modal --}}
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
                                      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6819e8', endColorstr='#6980f2',GradientType=1 );
      ">
          <h4 class="modal-title" style="color: #FFFFFF;">Time shedule</h4>
          <button type="button" class="close" data-dismiss="modal" style="margin-top: -45px;margin-right: -40px;">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
              <h1>select slots</h1>
              <p>Here you can see the available time slots for</p>
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
                    <td style="padding:0px !important"><button type="button" id="Monday_8" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_8" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="wednsday_8" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_8" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_8" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_8" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_8" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">10-12 AM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_10" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_10" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="wednsday_10" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_10" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_10" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_10" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_10" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">12-2 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_12" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_12" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="wednsday_12" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_12" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_12" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_12" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_12" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">2-4 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_2" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_2" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="wednsday_2" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_2" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_2" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_2" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_2" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">4-6 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_4" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_4" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="wednsday_4" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_4" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_4" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_4" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_4" class="btn btn-block">Select</button></td>
                  </tr>
                  <tr>
                    <th scope="row">6-8 PM</th>
                    <td style="padding:0px !important"><button type="button" id="Monday_6" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Tuesday_6" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="wednsday_6" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Thursday_6" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Friday_6" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Saturday_6" class="btn btn-block">Select</button></td>
                    <td style="padding:0px !important"><button type="button" id="Sunday_6" class="btn btn-block">Select</button></td>
                  </tr>
                </tbody>
              </table>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          
      </div>
  </div>
</div>
{{--  --}}

@endsection