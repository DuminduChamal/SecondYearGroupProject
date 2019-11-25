@extends('layouts.app')

@section('title')
    Tutors' Details
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
  <div class="container">
    <div class="header-body text-center mb-7">
      {{-- success messege when tutor removed --}}
        <div>
            @if (session('success'))
              <div class="alert alert-danger" role="alert">
                  {{ session('success') }}
              </div>
            @endif
        </div>
      <div class="row justify-content-center">
      {{-- <h3>System Users</h3>
      
      <table class="table table-striped">
          <tr>
              <th>Name</th>
              <th>Email adress</th>
              <th></th>
          </tr>
          @foreach ($users as $user)
              <tr>
                  <td>{{$user->FName}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                  <a href="deleteUser/{{$user->id}}" class="btn btn-warning">Delete</a>
                  </td>
              </tr>
          @endforeach
      </table>  --}}
      <div class="row mt-5">
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Tutors</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">NIC</th>
                      <th scope="col">DOB</th>
                      <th scope="col">Qualification</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($tutors as $tutor)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="/assets/img/avatar/{{$tutor->avatar}}">
                          </a>
                          <div class="media-body">
                            <span class="mb-0 text-sm">{{$tutor->FName}}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                          {{$tutor->LName}}
                      </td>
                      <td>
                          {{$tutor->email}}
                      </td>
                      <td>
                          {{$tutor->NIC}}
                      </td>
                      <td>
                          {{$tutor->DOB}}
                      </td>
                      <td>
                          {{-- {{$tutor->tutor->Qualification}} --}}
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" onclick="return confirm('Are you sure to remove {{$tutor->FName}}?')" href="#">Remove</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
    </svg>
  </div> --}}
</div>
@endsection
