@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('faq_active')
    active
@endsection
@section('admin_title')
    Edit Faq | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Update Faq</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">All Faqs</a></li>
                            <li class="breadcrumb-item active">Update Faq</li>
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
                        <form action="{{ route('admin.faq.update',$faq->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label>Title <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $faq->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Slug <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $faq->slug }}">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                    <option {{ $faq->status == $faq->isActive()?'selected':'' }} value="Active">Active</option>
                                    <option {{ $faq->status == $faq->isDeactive()?'selected':'' }} value="Deactive">Deactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                 <label class="form-label">Description<span class="text-danger">*</span></label>
                                 <textarea name="description" id="your_summernote" class="form-control">{{ $faq->description ?? old('description')}}</textarea>
                                 @error('description')
                                 <span class="text text-danger">{{$message}}</span>
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
    @if (Session::has('faq_update_success'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('faq_update_success') }}"
                })
        </script>
    @endif
@endsection
@endsection
