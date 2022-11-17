@extends('layouts.admin.admin_app')
@section('ecommerce_active')
    mm-active
@endsection
@section('coupon_active')
    active
@endsection
@section('admin_title')
    Create Coupons | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Create Coupon</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.coupon.index') }}">All Coupons</a></li>
                            <li class="breadcrumb-item active">Create Coupon</li>
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
                        <form action="{{ route('admin.coupon.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label>Title <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Coupon Code <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('coupon_code') is-invalid @enderror" name="coupon_code" value="{{ old('coupon_code') }}">
                                @error('coupon_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Discount Type <span class="text-danger">*</span> </label>
                                <select name="discount_type" class="form-select  @error('discount_type') is-invalid @enderror">
                                    <option value="">select type</option>
                                    <option value="Flat">Flat</option>
                                    <option value="Percent">Percent</option>
                                </select>
                                @error('discount_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Discount Amount <span class="text-danger">*</span> </label>
                                <input type="number" class="form-control @error('discount_amount') is-invalid @enderror" name="discount_amount" value="{{ old('discount_amount') }}">
                                @error('discount_amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Number Of Times<span class="text-danger">*</span> </label>
                                <input type="number" class="form-control @error('number_of_times') is-invalid @enderror" name="number_of_times" value="{{ old('number_of_times') }}">
                                @error('number_of_times')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Expiration Time<span class="text-danger">*</span> </label>
                                <input type="dateTime-local" class="form-control @error('expiration_date') is-invalid @enderror" name="expiration_date" value="{{ old('expiration_date') }}">
                                @error('expiration_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label>Status<span class="text-danger">*</span> </label>
                                <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                    <option value="">select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Create</button>
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
    @if (Session::has('coupon_created_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('coupon_created_successfully') }}"
                })
        </script>
    @endif
@endsection
@endsection
