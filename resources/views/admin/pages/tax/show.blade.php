@extends('layouts.admin.admin_app')
@section('ecommerce_active')
    mm-active
@endsection
@section('tax_active')
    active
@endsection
@section('admin_title')
    All Tax | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tax Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tax.index') }}">All Tax</a></li>
                            <li class="breadcrumb-item active">Tax Details</li>
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
                            <strong>Tax</strong>
                            <p>{{ $tax->title }}</p>
                        </span>
                        <span>
                            <strong>Amount</strong>
                            <p>{{ $tax->amount }}</p>
                        </span>
                        
                        <span>
                            <strong>Status</strong>
                            <p>{{ $tax->status }}</p>
                        </span>
                        <span>
                            <strong>Created By</strong>
                            <p>{{ $tax->createdBy->name }}</p>
                        </span>
                        <span>
                            <strong>Updated By</strong>
                            <p>{{ $tax->edited_by != ''?$tax->editedBy->name:'' }}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection