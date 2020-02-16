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
                          {{-- {{$class->tutor->Qualification}} --}}
                      </td>
                      <td>
                          {{$requestedTimeSlot->day}}
                      </td>
                      <td>
                          {{$requestedTimeSlot->time}}
                      </td>
                      <td>
                          {{-- {{$unapprovedTutor->Qualification}} --}}
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