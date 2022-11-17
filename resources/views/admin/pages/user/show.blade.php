@extends('layouts.admin.admin_app')
@section('user_active')
    mm-active
@endsection
@section('admin_title')
    User Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">User Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">All Users</a></li>
                            <li class="breadcrumb-item active">User Details</li>
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
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button fw-medium show" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        General Information
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                                    <div class="accordion-body text-muted">
                                        <span>
                                            <strong>Name</strong>
                                            <p>{{ $user->name }}</p>
                                        </span>
                                        <span>
                                            <strong>Username</strong>
                                            <p>{{ $user->username }}</p>
                                        </span>
                                        <span>
                                            <strong>Email</strong>
                                            <p>{{ $user->email }}</p>
                                        </span>
                                        <span>
                                            <strong>Phone</strong>
                                            <p>{{ $user->phone }}</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Shipping Address
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample" style="">
                                    <div class="accordion-body text-muted">
                                        @if ($user->shippingAddress != '')
                                            <span>
                                                <strong>Name</strong>
                                                <p>{{ $user->shippingAddress->name }}</p>
                                            </span>
                                            <span>
                                                <strong>Email</strong>
                                                <p>{{ $user->shippingAddress->email }}</p>
                                            </span>
                                            <span>
                                                <strong>Phone</strong>
                                                <p>{{ $user->shippingAddress->phone }}</p>
                                            </span>
                                            <span>
                                                <strong>Division</strong>
                                                <p>{{ $user->shippingAddress->divisions->name }}</p>
                                            </span>
                                            <span>
                                                <strong>District</strong>
                                                <p>{{ $user->shippingAddress->districts->name }}</p>
                                            </span>
                                            <span>
                                                <strong>Division</strong>
                                                <p>{{ $user->shippingAddress->upazilas->name }}</p>
                                            </span>
                                            <span>
                                                <strong>Address</strong>
                                                <p>{{ $user->shippingAddress->address }}</p>
                                            </span>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                       Billing Address
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample" style="">
                                    <div class="accordion-body text-muted">
                                        @if ($user->billingAddress != '')
                                            <span>
                                                <strong>Name</strong>
                                                <p>{{ $user->billingAddress->name }}</p>
                                            </span>
                                            <span>
                                                <strong>Email</strong>
                                                <p>{{ $user->billingAddress->email }}</p>
                                            </span>
                                            <span>
                                                <strong>Phone</strong>
                                                <p>{{ $user->billingAddress->phone }}</p>
                                            </span>
                                            <span>
                                                <strong>Division</strong>
                                                <p>{{ $user->billingAddress->divisions->name }}</p>
                                            </span>
                                            <span>
                                                <strong>District</strong>
                                                <p>{{ $user->billingAddress->districts->name }}</p>
                                            </span>
                                            <span>
                                                <strong>Division</strong>
                                                <p>{{ $user->billingAddress->upazilas->name }}</p>
                                            </span>
                                            <span>
                                                <strong>Address</strong>
                                                <p>{{ $user->shippingAddress->address }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!-- end accordion -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection