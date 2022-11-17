@extends('layouts.admin.admin_app')
@section('category_management')
    mm-active
@endsection
@section('subcategory_active')
    active
@endsection
@section('admin_title')
    Sub Category Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">SubCategory Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.subCategory.index') }}">All Sub Categoires</a></li>
                            <li class="breadcrumb-item active">Sub Category Details</li>
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
                            
                            @if ($subCategory->image == 'default.png')
                            <img style="height: 100px;width:100px;" src="{{ asset('files/photo/sub_category') }}/{{ $subCategory->image }}" alt="image">
                            @else
                                <img style="height: 100px;width:100px;" class="img-rounded" src="{{ asset('files') }}/{{ $subCategory->image }}" alt="category Image">
                            @endif
                        </span>
                        <br>
                        <span>
                            <strong>Category</strong>
                            <p>{{ $subCategory->category->name }}</p>
                        </span>
                        <span>
                            <strong>Name</strong>
                            <p>{{ $subCategory->name }}</p>
                        </span>
                        <span>
                            <strong>Serial</strong>
                            <p>{{ $subCategory->serial }}</p>
                        </span>
                        <span>
                            <strong>Slug</strong>
                            <p>{{ $subCategory->slug }}</p>
                        </span>
                        <span>
                            <strong>Meta Title</strong>
                            <p>{{ $subCategory->meta_title }}</p>
                        </span>
                        <span>
                            <strong>Meta Details</strong>
                            <p>{{ $subCategory->meta_details }}</p>
                        </span>
                        <span>
                            <strong>Meta Keywords</strong>
                            <p>{{ $subCategory->meta_keywords }}</p>
                        </span>
                        <span>
                            <strong>Status</strong>
                            <p>{{ $subCategory->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $subCategory->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $subCategory->edited_by != ''?$subCategory->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection