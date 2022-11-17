@extends('layouts.admin.admin_app')
@section('category_management')
    mm-active
@endsection
@section('childcategory_active')
    active
@endsection
@section('admin_title')
    Edit Child Category | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Update Sub Category</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.subCategory.index') }}">All Sub Categories</a></li>
                            <li class="breadcrumb-item active">Update Sub Category</li>
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
                        <form action="{{ route('admin.childCategory.update',$childCategory->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group mb-4">
                                <label>Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Category</label>
                                <select name="category_id" class="form-select  @error('category_id') is-invalid @enderror">
                                    <option value="">select category</option>
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $childCategory->category_id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Sub Category</label>
                                <select name="sub_category_id" class="form-select  @error('sub_category_id') is-invalid @enderror">
                                    <option value="">select sub category</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option {{ $subCategory->id == $childCategory->sub_category_id ? 'selected':'' }} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $childCategory->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Serial <span class="text-danger">*</span> </label>
                                <input type="number" class="form-control @error('serial') is-invalid @enderror" name="serial" value="{{ $childCategory->serial }}">
                                @error('serial')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Slug <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $childCategory->slug }}">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Keywords (press enter for seperate tag)</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ $childCategory->meta_keywords }}">
                                @error('meta_keywords')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $childCategory->meta_title }}">
                                @error('meta_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Details</label>
                                <textarea name="meta_details" class="form-control @error('meta_details') is-invalid @enderror" cols="30" rows="3">{{ $childCategory->meta_details }}</textarea>
                                @error('meta_details')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                    <option {{ $childCategory->id == $subCategory->isActive() }} value="Active">Active</option>
                                    <option {{ $childCategory->id == $subCategory->isDeactive() }} value="Deactive">Deactive</option>
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
    @if (Session::has('child_category_update_success'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('child_category_update_success') }}"
                })
        </script>
    @endif
@endsection
@endsection