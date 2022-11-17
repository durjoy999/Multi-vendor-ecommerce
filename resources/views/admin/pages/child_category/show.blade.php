@extends('layouts.admin.admin_app')
@section('category_management')
    mm-active
@endsection
@section('childcategory_active')
    active
@endsection
@section('admin_title')
    Child Category Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Child Category Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.childCategory.index') }}">All Child Categoires</a></li>
                            <li class="breadcrumb-item active">Child Category Details</li>
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
                            
                            @if ($childCategory->image == 'default.png')
                            <img style="height: 100px;width:100px;" src="{{ asset('files/photo/child_category') }}/{{ $childCategory->image }}" alt="image">
                            @else
                                <img style="height: 100px;width:100px;" class="img-rounded" src="{{ asset('files') }}/{{ $childCategory->image }}" alt="category Image">
                            @endif
                        </span>
                        <br>
                        <span>
                            <strong>Category</strong>
                            <p>{{ $childCategory->category->name }}</p>
                        </span>
                        <span>
                            <strong>Sub Category</strong>
                            <p>{{ $childCategory->subCategory->name }}</p>
                        </span>
                        <span>
                            <strong>Name</strong>
                            <p>{{ $childCategory->name }}</p>
                        </span>
                        <span>
                            <strong>Serial</strong>
                            <p>{{ $childCategory->serial }}</p>
                        </span>
                        <span>
                            <strong>Slug</strong>
                            <p>{{ $childCategory->slug }}</p>
                        </span>
                        <span>
                            <strong>Meta Title</strong>
                            <p>{{ $childCategory->meta_title }}</p>
                        </span>
                        <span>
                            <strong>Meta Details</strong>
                            <p>{{ $childCategory->meta_details }}</p>
                        </span>
                        <span>
                            <strong>Meta Keywords</strong>
                            <p>{{ $childCategory->meta_keywords }}</p>
                        </span>
                        <span>
                            <strong>Status</strong>
                            <p>{{ $childCategory->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $childCategory->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $childCategory->edited_by != ''?$childCategory->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection