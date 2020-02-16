@extends('layouts.app')

@section('title')
    Accepted Sessions
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
          @if(count($classes)>0)
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Tutor Accepted Sessions</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Tutor First Name</th>
                      <th scope="col">Tutor Last Name</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Rating</th>
                      <th scope="col">Day</th>
                      <th scope="col">Time</th>
                      <th scope="col">Rate</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($classes as $class)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="/assets/img/avatar/{{$class->tutor->user->avatar}}">
                          </a>
                          <div class="media-body">
                            <span class="mb-0 text-sm">{{$class->tutor->user->FName}}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        <span class="mb-0 text-sm">{{$class->tutor->user->LName}}</span>
                      </td>
                      <td>
                        <span class="mb-0 text-sm">{{$class->tutor->subject->subject}}</span>
                      </td>
                      <td>
                        @if(($class->tutor->user->rating)=='1')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="1 star"></label>
                                </div>
                            </fieldset>
                            @endif
                            @if(($class->tutor->user->rating)=='2')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="2 star"></label>
                                    <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                                </div>
                            </fieldset>
                            @endif
                            @if(($class->tutor->user->rating)=='3')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="3 star"></label>
                                    <label for="demo-2" aria-label="2 stars" title="3 stars"></label>
                                    <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                                </div>
                            </fieldset>
                            @endif
                            @if(($class->tutor->user->rating)=='4')
                            <fieldset class="rating">
                                <div class="stars">
                                    <label for="demo-1" aria-label="1 star" title="4 star"></label>
                                    <label for="demo-2" aria-label="2 stars" title="4 stars"></label>
                                    <label for="demo-3" aria-label="3 stars" title="4 stars"></label>
                                    <label for="demo-4" aria-label="4 stars" title="4 stars"></label>   
                                </div>
                            </fieldset>
                            @endif
                            @if(($class->tutor->user->rating)=='5')
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
                        {{$class->day}}
                      </td>
                      <td>
                        {{$class->time}}
                      </td>
                      <td>
                        <span class="mb-0 text-sm">{{$class->tutor->rate}}</span>
                      </td>
                      <td>
                        <a href="{{route('student.payment',['tutor'=> $class->tutor_id,'day'=> $class->day,'time'=> $class->time])}}" class="btn btn-info">Pay</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @else
              <h1>No Accepted Sessions Yet!</h1>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection