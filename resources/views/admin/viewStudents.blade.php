@extends('layouts.app')

@section('title')
    Students Details
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
  <div class="container">
    <div class="header-body text-center mb-7">
      {{-- success messege when user removed --}}
            @if (session('success'))
              <div class="alert alert-danger" role="alert">
                  {{ session('success') }}
              </div>
            @endif
      <div class="row justify-content-center">
        <div class="row mt-5">
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Students</h3>
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
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($students as $student)
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="/assets/img/avatar/{{$student->avatar}}">
                          </a>
                          <div class="media-body">
                            <span class="mb-0 text-sm">{{$student->FName}}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                          {{$student->LName}}
                      </td>
                      <td>
                          {{$student->email}}
                      </td>
                      <td>
                          {{$student->NIC}}
                      </td>
                      <td>
                          {{$student->DOB}}
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{route('admin.viewstudentprofile',['student'=>$student->id])}}">View</a>
                          <a class="dropdown-item" onclick="return confirm('Are you sure to remove {{$student->FName}}?')" href="{{route('admin.removestudent',['student'=>$student->id])}}">Remove</a>  
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
</div>
@endsection