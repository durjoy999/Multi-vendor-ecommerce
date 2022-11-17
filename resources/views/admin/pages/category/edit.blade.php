@extends('layouts.admin.admin_app')
@section('category_management')
    mm-active
@endsection
@section('category_active')
    active
@endsection
@section('admin_title')
    Edit Cateogry | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Update Category</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">All Categories</a></li>
                            <li class="breadcrumb-item active">Update Category</li>
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
                        <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Serial <span class="text-danger">*</span> </label>
                                <input type="number" class="form-control @error('serial') is-invalid @enderror" name="serial" value="{{ $category->serial }}">
                                @error('serial')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Slug <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Keywords (press enter for seperate tag)</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ $category->meta_keywords }}">
                                @error('meta_keywords')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $category->meta_title }}">
                                @error('meta_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Details</label>
                                <textarea name="meta_details" class="form-control @error('meta_details') is-invalid @enderror" cols="30" rows="3">{{ $category->meta_details }}</textarea>
                                @error('meta_details')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                    <option {{ $category->status == $category->isActive()?'selected':'' }} value="Active">Active</option>
                                    <option {{ $category->status == $category->isDeactive()?'selected':'' }} value="Deactive">Deactive</option>
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
    @if (Session::has('category_update_success'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('category_update_success') }}"
                })
        </script>
    @endif
@endsection
@endsection