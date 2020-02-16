@extends('layouts.app')

@section('title')
    Requested Sessions
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
  <div class="container">
    <div class="header-body text-center mb-7">
      {{-- success messege when tutor removed --}}
      <div>
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
      <div class="row justify-content-center">
      <div class="row mt-5">
          @if(count($requestedTimeSlots)>0)
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Student Requested Sessions</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Student First Name</th>
                      <th scope="col">Student Last Name</th>
                      <th scope=col>Rating</th>
                      <th scope="col">Day</th>
                      <th scope="col">Time</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($requestedTimeSlots as $requestedTimeSlot)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="/assets/img/avatar/{{$requestedTimeSlot->student->avatar}}">
                          </a>
                          <div class="media-body">
                            <span class="mb-0 text-sm">{{$requestedTimeSlot->student->FName}}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                          {{$requestedTimeSlot->student->LName}}
                      </td>
                      <td>
                            @if(($requestedTimeSlot->student->rating)=='1')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="1 star"></label>
                                </div>
                            </fieldset>
                            @endif
                            @if(($requestedTimeSlot->student->rating)=='2')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="2 star"></label>
                                    <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                                </div>
                            </fieldset>
                            @endif
                            @if(($requestedTimeSlot->student->rating)=='3')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="3 star"></label>
                                    <label for="demo-2" aria-label="2 stars" title="3 stars"></label>
                                    <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                                </div>
                            </fieldset>
                            @endif
                            @if(($requestedTimeSlot->student->rating)=='4')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="4 star"></label>
                                    <label for="demo-2" aria-label="2 stars" title="4 stars"></label>
                                    <label for="demo-3" aria-label="3 stars" title="4 stars"></label>
                                    <label for="demo-4" aria-label="4 stars" title="4 stars"></label>   
                                </div>
                            </fieldset>
                            @endif
                            @if(($requestedTimeSlot->student->rating)=='5')
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
                      </td>
                      <td>
                          {{$requestedTimeSlot->day}}
                      </td>
                      <td>
                          {{$requestedTimeSlot->time}}
                      </td>
                      <td>
                        <a onclick="return confirm('Are you sure to accept {{$requestedTimeSlot->student->FName}}\'s session on {{$requestedTimeSlot->day}} at {{$requestedTimeSlot->time}}?')" href="{{route('tutor.accept',['student'=> $requestedTimeSlot->stu_id,'day'=> $requestedTimeSlot->day,'time'=> $requestedTimeSlot->time])}}" class="btn btn-info">Accept</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @else
              <h1>No Requested Sessions Yet!</h1>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection