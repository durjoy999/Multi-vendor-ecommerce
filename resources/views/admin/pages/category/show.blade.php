@extends('layouts.admin.admin_app')
@section('category_management')
    mm-active
@endsection
@section('category_active')
    active
@endsection
@section('admin_title')
    Cateogry Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Category Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">All Categories</a></li>
                            <li class="breadcrumb-item active">Category Details</li>
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
                            
                            @if ($category->image == 'default.png')
                            <img style="height: 100px;width:100px;" src="{{ asset('files/photo/category') }}/{{ $category->image }}" alt="image">
                            @else
                                <img style="height: 100px;width:100px;" class="img-rounded" src="{{ asset('files') }}/{{ $category->image }}" alt="category Image">
                            @endif
                        </span>
                        <br>
                        <span>
                            <strong>Name</strong>
                            <p>{{ $category->name }}</p>
                        </span>
                        <span>
                            <strong>Serial</strong>
                            <p>{{ $category->serial }}</p>
                        </span>
                        <span>
                            <strong>Slug</strong>
                            <p>{{ $category->slug }}</p>
                        </span>
                        <span>
                            <strong>Meta Title</strong>
                            <p>{{ $category->meta_title }}</p>
                        </span>
                        <span>
                            <strong>Meta Details</strong>
                            <p>{{ $category->meta_details }}</p>
                        </span>
                        <span>
                            <strong>Meta Keywords</strong>
                            <p>{{ $category->meta_keywords }}</p>
                        </span>
                        <span>
                            <strong>Status</strong>
                            <p>{{ $category->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $category->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $category->edited_by != ''?$category->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection