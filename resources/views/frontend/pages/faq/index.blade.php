@extends('layouts.frontend.frontend_app')
@section('frontend_content')
     <!-- Start Breadcrumb Area  -->
     <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Pages</li>
                        </ul>
                        <h1 class="title">Terms Of Use</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{ asset('frontend_assets') }}/images/product/product-45.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start Privacy Policy Area  -->
    <div class="axil-privacy-area axil-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="axil-privacy-policy">
                        @forelse ($faqs as $faq )
                        <h4 class="title">{{ $faq->title }}</h4>
                        <p>{!! $faq->description !!}</p>
                        @empty
                          no data
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Privacy Policy Area  -->
@endsection
