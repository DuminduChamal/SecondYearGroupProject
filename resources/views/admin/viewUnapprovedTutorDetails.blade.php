@extends('layouts.app')

@section('title')
    {{$unapprovedTutor->user->FName}}'s Details
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="card">
            <div class="card-header">
              <b>{{$unapprovedTutor->user->FName}} {{$unapprovedTutor->user->LName}}</b>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i>Subject Requested</i> : {{$unapprovedTutor->subject_id}}</li>
                <li class="list-group-item"><i>Qualification</i> : {{$unapprovedTutor->Qualification}}</li>
                <li class="list-group-item"><i>Referee Name</i> : {{$unapprovedTutor->referName}}</li>
                <li class="list-group-item"><i>Status</i> : {{$unapprovedTutor->referStatus}}</li>
                <li class="list-group-item"><i>Referee Email</i> : {{$unapprovedTutor->referEmail}}</li>
                <li class="list-group-item"><i>Referee Number</i> : {{$unapprovedTutor->referNumber}}</li>
            </ul>
          </div>
          <br/>
        {{-- Confirmation button --}}
        <a type="button" class="btn btn-success" onclick="return confirm('Are you sure to approve {{$unapprovedTutor->FName}}?')" href="{{route('admin.approved',['tutor'=>$unapprovedTutor->id])}}">Approve</a>
        {{-- Delete button --}}
        <a type="button" class="btn btn-danger" onclick="return confirm('Are you sure to remove {{$unapprovedTutor->FName}}?')" href="{{route('admin.tutor.reject',['tutor'=>$unapprovedTutor->id])}}">Rejected</a>
    </div>
</div>
@endsection