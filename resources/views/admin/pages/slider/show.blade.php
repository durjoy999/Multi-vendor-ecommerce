@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('slider_active')
    active
@endsection
@section('admin_title')
    Slider Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Slider Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">All Sliders</a></li>
                            <li class="breadcrumb-item active">Slider Details</li>
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
                             <img style="height: 150px;width:200px;" class="img-rounded" src="{{ asset('files') }}/{{ $slider->image }}" alt="slider Image">
                        </span>
                        <br>
                        <span>
                            <strong>title</strong>
                            <p>{{ $slider->title }}</p>
                        </span>
                        <span>
                            <strong>sub_title</strong>
                            <p>{{ $slider->sub_title }}</p>
                        </span>
                        <span>
                            <strong>button_text</strong>
                            <p>{{ $slider->button_text }}</p>
                        </span>
                        <span>
                            <strong>button_link</strong>
                            <p>{{ $slider->button_link }}</p>
                        </span>
                        <span>
                            <strong>Status</strong>
                            <p>{{ $slider->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $slider->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $slider->edited_by != ''?$slider->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection
