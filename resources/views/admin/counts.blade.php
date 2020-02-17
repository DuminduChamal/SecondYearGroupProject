@extends('layouts.app')

@section('title')
    Tutors' Details
@endsection

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
  <div class="container">
    <div class="header-body text-center mb-7">
      <div class="row justify-content-center">
      <div class="row mt-5">
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">User Count</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">User types</th>
                      <th scope="col">Count</th>
                      {{-- <th scope="col">Email</th>
                      <th scope="col">NIC</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Qualification</th>
                      <th scope="col">Rating</th>
                      <th scope="col"></th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>
                            Students
                        </td>
                        <td>
                            {{count($students)}}
                        </td>
                    </tr>
                    <tr>
                      <td>
                          Approved Tutors
                      </td>
                      <td>
                          {{count($tutors)}}
                      </td>
                    </tr>
                    <tr>
                        <td>
                            Requested Tutors
                        </td>
                        <td>
                            {{count($unapprovedtutors)}}
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <a class="btn btn-light" href="#">Print PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
