@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('team_active')
    active
@endsection
@section('admin_title')
    Edit Team | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Update Team</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">All Teams</a></li>
                            <li class="breadcrumb-item active">Update Team</li>
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
                        <form action="{{ route('admin.team.update',$team->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label>Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $team->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Designation <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $team->designation }}">
                                @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                    <option {{ $team->status == $team->isActive()?'selected':'' }} value="Active">Active</option>
                                    <option {{ $team->status == $team->isDeactive()?'selected':'' }} value="Deactive">Deactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@section('admin_js')
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=meta_keywords]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
    @if (Session::has('team_update_success'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('team_update_success') }}"
                })
        </script>
    @endif
@endsection
@endsection
