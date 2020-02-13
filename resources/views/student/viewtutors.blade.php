@extends('layouts.app')

@section('title')
    Tutor List
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">

        {{-- success messege when user removed --}}
                {{-- @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif --}}


        <div class="row justify-content-center">
            <div class="row mt-5">
            <div class="col">
                <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">Tutors</h3>
                    <br>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Rate</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($tutors as $tutor)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="col-sm-4">
                                            {{-- <div class="thumbnail"> --}}
                                                <a href="viewtutors/{{$tutor->id}}" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="/assets/img/avatar/{{$tutor->user->avatar}}">
                                                </a>
                                              {{-- <img src="paris.jpg" alt="Paris"> --}}
                                              <p><strong>{{$tutor->user->FName}} {{$tutor->user->LName}}</strong></p>
                                              <button type="button" class="btn btn-warning"><b>{{$tutor->rate}} LKR <br>Per session</b></button>
                                            {{-- </div> --}}
                                    </div>
                                </th>
                                <td>
                                    {{$tutor->Qualification}}
                                </td>
                                <td>
                                    {{$tutor->subject_id}}
                                </td>
                                <td>
                                    {{$tutor->rate}}
                                </td>
                                <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="viewtutors/{{$tutor->id}}">View Tutor Profile</a>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$tutors->links()}}
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