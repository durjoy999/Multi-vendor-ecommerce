@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('quicklinks_active')
    active
@endsection
@section('admin_title')
    All Quick Show | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Quick Link Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.quickLink.index') }}">All Quick Links</a></li>
                            <li class="breadcrumb-item active">Quick Link Details</li>
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
                        <span>
                            <strong>Title</strong>
                            <p>{{ $quicklink->title }}</p>
                        </span>
                        <span>
                            <strong>Details</strong>
                            <p>{{ $quicklink->details }}</p>
                        </span>
                        <span>
                            <strong>Status</strong>
                            <p>{{ $quicklink->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $quicklink->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $quicklink->edited_by != ''?$quicklink->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection
