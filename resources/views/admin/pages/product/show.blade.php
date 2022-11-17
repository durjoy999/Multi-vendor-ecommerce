@extends('layouts.admin.admin_app')
@section('brand_active')
    mm-active
@endsection
@section('admin_title')
    Brand Details | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Product Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">All products</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
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
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="product-detai-imgs">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-4">
                                            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                @foreach ($product->galleryImages as $image)
                                                <a @class([
                                                    'nav-link',
                                                    'active' => $loop->first,
                                                ]) id="product-{{ $image->id }}-tab" data-bs-toggle="pill" href="#product-{{ $image->id }}" role="tab" aria-controls="product-{{ $image->id }}" aria-selected="true">
                                                    <img src="{{ asset('files') }}/{{ $image->image }}" alt="image" class="img-fluid mx-auto d-block rounded">
                                                </a>
                                                @endforeach
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                @foreach ($product->galleryImages as $image)
                                                    
                                                
                                                <div
                                                @class([
                                                    'tab-pane fade',
                                                    'show active' => $loop->first,
                                                ]) 
                                                  id="product-{{ $image->id }}" role="tabpanel" aria-labelledby="product-{{ $image->id }}-tab">
                                                    <div>
                                                        <img src="{{ asset('files') }}/{{ $image->image }}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                @endforeach 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mt-4 mt-xl-3">
                                    <a href="javascript: void(0);" class="text-primary">{{ $product->brand->name }} || {{ $product->category->name }} | {{ $product->subCategory->name }} | {{ $product->childCategory->name }}</a>
                                    <h4 class="mt-1 mb-3">{{ $product->title }}</h4>

                                    <p class="text-muted float-start me-3">
                                        <span class="bx bxs-star text-warning"></span>
                                        <span class="bx bxs-star text-warning"></span>
                                        <span class="bx bxs-star text-warning"></span>
                                        <span class="bx bxs-star text-warning"></span>
                                        <span class="bx bxs-star"></span>
                                    </p>
                                    <p class="text-muted mb-4">( 152 Customers Review )</p>

                                    {{-- <h6 class="text-success text-uppercase">20 % Off</h6> --}}
                                    <h5 class="mb-4">Price : <span class="text-muted me-2"><del> ৳ {{ $product->previous_price }}</del></span> <b>৳ {{ $product->current_price }}</b></h5>
                                    <p class="text-muted mb-4">{{ $product->short_details }}</p>
                                    {{-- <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Wireless</p>
                                                <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i> Wireless Range : 10m</p>
                                                <p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary me-1"></i> Battery life : 6hrs</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i> Bass</p>
                                                <p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary me-1"></i> Warranty : 1 Year</p>
                                            </div>
                                        </div>
                                    </div> --}}

                                   
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="mt-5">
                            <h5 class="mb-3">Specifications :</h5>

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 400px;">Category</th>
                                            <td>Headphone</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Brand</th>
                                            <td>JBL</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Color</th>
                                            <td>Black</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Connectivity</th>
                                            <td>Bluetooth</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Warranty Summary</th>
                                            <td>1 Year</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h5 class="mb-3">Details :</h5>

                          <p>{!! $product->long_details !!}</p>
                        </div>
                        <!-- end Specifications -->

                        <div class="mt-5">
                            <h5>Reviews :</h5>

                            <div class="mt-4 border p-4">

                                <div class="row">
                                    <div class="col-xl-3 col-md-5">
                                        <div>
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-2.jpg" class="avatar-sm rounded-circle" alt="img">
                                                <div class="flex-1 ms-4">
                                                    <h5 class="mb-2 font-size-15 text-primary">Jerry Rossiter</h5>
                                                    <h5 class="text-muted font-size-15">kuwait</h5>
                                                    <p class="text-muted">65 Followers, 86 Reviews</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-md-7">
                                        <div>
                                            <p class="text-muted mb-2">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <span class="ms-3"><i class="far fa-calendar-alt text-primary me-1"></i> 15/09/2021</span>
                                            </p>
                                            
                                            <p class="text-muted">Maecenas non vestibulum ante, nec efficitur orci. Duis eu ornare mi, quis bibendum quam. Etiam imperdiet aliquam purus sit amet rhoncus. Vestibulum pretium consectetur leo, in mattis 
                                                ipsum sollicitudin eget. Pellentesque vel mi tortor. Nullam vitae maximus dui dolor sit amet, consectetur adipiscing elit.</p>
                                            <ul class="list-inline float-sm-end mb-sm-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 border p-4">
                                <div class="row">
                                    <div class="col-xl-3 col-md-5">
                                        <div>
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-4.jpg" class="avatar-sm rounded-circle" alt="img">
                                                <div class="flex-1 ms-4">
                                                    <h5 class="mb-2 font-size-15 text-primary">Ernest Broadnax</h5>
                                                    <h5 class="text-muted font-size-15">French</h5>
                                                    <p class="text-muted">86 Followers, 56 Reviews</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-md-7">
                                        <div>
                                            <p class="text-muted mb-2">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star"></i>
                                                <span class="ms-3"><i class="far fa-calendar-alt text-primary me-1"></i> 21/09/2021</span>
                                            </p>
                                            
                                            <p class="text-muted">Cras ac condimentum velit. Quisque vitae elit auctor quam egestas congue. Duis eget lorem fringilla, ultrices justo consequat, gravida lorem.
                                                 Maecenas orci enim, sodales id condimentum et, nisl arcu aliquam velit, sit amet vehicula turpis metus cursus dolor cursus eget dui.</p>
                                            <ul class="list-inline float-sm-end mb-sm-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 border p-4">
                                <div class="row">
                                    <div class="col-xl-3 col-md-5">
                                        <div>
                                            <div class="d-flex">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle font-size-16">
                                                        N
                                                    </span>
                                                </div>
                                                <div class="flex-1 ms-4">
                                                    <h5 class="mb-2 font-size-15 text-primary">Norman Maness</h5>
                                                    <h5 class="text-muted font-size-15">Australian</h5>
                                                    <p class="text-muted">105 Followers, 40 Reviews</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-md-7">
                                        <div>
                                            <p class="text-muted mb-2">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <span class="ms-3"><i class="far fa-calendar-alt text-primary me-1"></i> 30/09/2021</span>
                                            </p>
                                            
                                            <p class="text-muted">Aliquam sit amet eros eleifend, tristique ante sit amet, eleifend arcu. Cras ut diam quam. Fusce quis diam eu augue semper ullamcorper vitae sed massa. Mauris lacinia, massa a feugiat mattis, leo massa porta eros, sed congue arcu sem nec orci.
                                                 In ac consectetur augue. Nullam pulvinar risus non augue tincidunt blandit.</p>
                                            <ul class="list-inline float-sm-end mb-sm-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection