@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('massage_active')
    active
@endsection
@section('admin_title')
    User Massage Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">User Massage Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.userMassage.index') }}">All User Massages</a></li>
                            <li class="breadcrumb-item active">User Massages Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <table class="table table-bordered border-primary">
                        <thead>

                          <tr>
                            <th>Image</th>
                            <th>
                             @if ($userMassage->image == 'default.png')
                                 <img style="height: 80px;width:80px;" src="{{ asset('files/photo/userMassage') }}/{{ $userMassage->image }}" alt="image">
                             @else
                                 <img style="height: 80px;width:80px;" src="{{ asset('files') }}/{{ $userMassage->image }}" alt="image">
                             @endif
                            </th>
                          </tr>
                          <tr>
                            <th>Name</th>
                            <th>{{ $userMassage->userId->name }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>Subject</th>
                            <th>{{ $userMassage->subject }}</th>
                          </tr>
                            <tr>
                            <th>Status</th>
                            <th>{{ $userMassage->status }}</th>
                          </tr>
                            <tr>
                            <th>Massage</th>
                            <th>{{ $userMassage->massage }}</th>
                          </tr>
                        </tbody>
                      </table>
                      <a href="{{ route('admin.userMassage.massage',$userMassage->id) }}" class="btn btn-success btn-sm dropdown-toggle">Send Massage</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection
