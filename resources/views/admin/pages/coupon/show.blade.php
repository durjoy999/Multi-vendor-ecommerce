@extends('layouts.admin.admin_app')
@section('ecommerce_active')
    mm-active
@endsection
@section('coupon_active')
    active
@endsection
@section('admin_title')
    Show Coupon | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Coupon Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.coupon.index') }}">All Coupons</a></li>
                            <li class="breadcrumb-item active">Coupon Details</li>
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
                            <strong>Title</strong>
                            <p>{{ $coupon->title }}</p>
                        </span>
                        <span>
                            <strong>Discount Type</strong>
                            <p>{{ $coupon->discount_type }}</p>
                        </span>
                        <span>
                            <strong>Discount Amount</strong>
                            <p>{{ $coupon->discount_amount }}</p>
                        </span>
                        <span>
                            <strong>Expiration Date</strong>
                            <p>
                                {{ date("j F Y", strtotime($coupon->expiration_date )) }}
                                <br>
                                {{ date("g:i a", strtotime($coupon->expiration_date )) }}
                            </p>
                        </span>
                        <span>
                            <strong>Coupon Code</strong>
                            <p>{{ $coupon->coupon_code }}</p>
                        </span>
                        <span>
                            <strong>Number If Times</strong>
                            <p>{{ $coupon->number_of_times }}</p>
                        </span>
                        <span>
                            <strong>Number Of Times Remaining</strong>
                            <p>{{ $coupon->number_of_times_remaining }}</p>
                        </span>
                        <span>
                            <strong>Status</strong>
                            <p>{{ $coupon->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $coupon->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $coupon->edited_by != ''?$coupon->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection
