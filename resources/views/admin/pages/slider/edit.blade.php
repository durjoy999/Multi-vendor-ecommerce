@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('slider_active')
    active
@endsection
@section('admin_title')
    Edit Slider | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Update Slider</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">All Sliders</a></li>
                            <li class="breadcrumb-item active">Update Slider</li>
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
                        <form action="{{ route('admin.slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label>Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Title <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $slider->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Subtitle <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" value="{{ $slider->sub_title }}">
                                @error('sub_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Button Text <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('button_text') is-invalid @enderror" name="button_text" value="{{ $slider->button_text}}">
                                @error('button_text')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Button Link <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('button_link') is-invalid @enderror" name="button_link" value="{{ $slider->button_link }}">
                                @error('button_link')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                    <option {{ $slider->status == $slider->isActive()?'selected':'' }} value="Active">Active</option>
                                    <option {{ $slider->status == $slider->isDeactive()?'selected':'' }} value="Deactive">Deactive</option>
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
    @if (Session::has('slider_update_success'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('slider_update_success') }}"
                })
        </script>
    @endif
@endsection
@endsection
