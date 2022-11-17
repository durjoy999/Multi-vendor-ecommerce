@extends('layouts.admin.admin_app')
@section('brand_active')
    mm-active
@endsection
@section('admin_title')
    Brand Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Brand Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">All Brands</a></li>
                            <li class="breadcrumb-item active">Brand Details</li>
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
                            
                            @if ($brand->image == 'default.png')
                            <img style="height: 100px;width:100px;" src="{{ asset('files/photo/brand') }}/{{ $brand->image }}" alt="image">
                            @else
                                <img style="height: 100px;width:100px;" class="img-rounded" src="{{ asset('files') }}/{{ $brand->image }}" alt="brand Image">
                            @endif
                        </span>
                        <br>
                        <span>
                            <strong>Name</strong>
                            <p>{{ $brand->name }}</p>
                        </span>
                        <span>
                            <strong>Serial</strong>
                            <p>{{ $brand->serial }}</p>
                        </span>
                        <span>
                            <strong>Slug</strong>
                            <p>{{ $brand->slug }}</p>
                        </span>
                        <span>
                            <strong>Meta Title</strong>
                            <p>{{ $brand->meta_title }}</p>
                        </span>
                        <span>
                            <strong>Meta Details</strong>
                            <p>{{ $brand->meta_details }}</p>
                        </span>
                        <span>
                            <strong>Meta Keywords</strong>
                            <p>{{ $brand->meta_keywords }}</p>
                        </span>
                        <span>
                            <strong>Status</strong>
                            <p>{{ $brand->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $brand->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $brand->edited_by != ''?$brand->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection