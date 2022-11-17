@extends('layouts.frontend.frontend_app')
@section('frontend_content')
    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-2">
        <div class="container">
            <div class="slider-offset-left">
                <div class="row row--20">
                    <div class="col-lg-9">
                        <div class="slider-box-wrap">
                            <div class="slider-activation-one axil-slick-dots">
                                @foreach ($sliders as $slider)
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="fal fa-watch"></i> {{ $slider->sub_title }}</span>
                                        <h1 class="title">{{ $slider->title }}</h1>
                                        <div class="shop-btn">
                                            <a href="{{ $slider->button_link }}" class="axil-btn">{{ $slider->button_text }} <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="{{ asset('files') }}/{{$slider->image}}" alt="{{$slider->image}}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                       @if ($heroProduct != '')
                        <div class="slider-product-box">
                            <div class="product-thumb">
                                <a href="{{ $heroProduct->product_link }}">
                                    @if ($heroProduct->image == 'default.png')
                                        <img src="{{ asset('files/photo/hero_product') }}/{{$heroProduct->image}}" alt="product image">
                                    @else
                                        <img src="{{ asset('files') }}/{{$heroProduct->image}}" alt="product image">
                                    @endif
                                </a>
                            </div>
                            <h6 class="title"><a href="{{ $heroProduct->product_link }}">{{ $heroProduct->title }}</a></h6>
                            <span class="price">${{ $heroProduct->price }}</span>
                        </div>
                       @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->
    <!-- Start Categorie Area  -->
    <div class="axil-categorie-area bg-color-white pt--50">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Categories</span>
                <h2 class="title">Browse by Category</h2>
            </div>
            <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @forelse ($categorys as $category )
                <div class="slick-single-layout">
                    <div class="categrie-product" data-sal="zoom-out" data-sal-delay="300" data-sal-duration="500">
                        <a href="shop.html">
                            @if ($category->image == 'default.png')
                            <img class="img-fluid" src="{{ asset('files/photo/category') }}/{{ $category->image }}" alt="product categorie">
                                
                            @else
                            <img class="img-fluid" src="{{ asset('files') }}/{{ $category->image }}" alt="product categorie">

                            @endif
                            
                            <h6 class="cat-title">{{ $category->name }}</h6>
                        </a>
                    </div>
                    <!-- End .categrie-product -->
                </div>
                @empty
                   no data
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Categorie Area  -->
    <!-- Start Brand Area  -->
    <div class="axil-categorie-area bg-color-white pt--50">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Brands</span>
                <h2 class="title">Browse by Brands</h2>
            </div>
            <div class="brand-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
            @forelse ($brands as $brand)
                <div class="slick-single-layout">
                    <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                        <a href="shop.html">
                            @if ($brand->image == 'default.png')  
                            <img class="img-fluid" src="{{ asset('files/photo/brand') }}/{{ $brand->image }}" alt="product categorie">
                            @else
                            <img class="img-fluid" src="{{ asset('files') }}/{{ $brand->image }}" alt="product categorie">
                            @endif
                            <h6 class="cat-title">{{ $brand->name }}</h6>
                        </a>
                    </div>
                    <!-- End .categrie-product -->
                </div>
            @empty
              no data
            @endforelse


            </div>
        </div>
    </div>
    <!-- End Brand Area  -->

    <!-- Start New Arrivals Product Area  -->
    <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
        <div class="container ml--xxl-0">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This Week’s</span>
                    <h2 class="title">New Arrivals</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-1.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Top Handle Handbag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$80</span>
                                        <span class="price current-price">$60</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-2.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-6.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Leather Bag For Men</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
    </div>
    <!-- End New Arrivals Product Area  -->
    <!-- Start Best Sellers Product Area  -->
    <div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"><i class="far fa-shopping-basket"></i>This Month</span>
                <h2 class="title">Best Sellers</h2>
            </div>
            <div class="new-arrivals-product-activation-2 product-transparent-layout slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Full Sleev Tshirt</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(64)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-16.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Comfort Unisex Hoddie</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(44)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-17.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Stylish Hoddie</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(60)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-18.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Sky Blue T-shirt</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(22)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-19.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Modern Hoddie</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(64)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-20.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Blue T-shirt</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(14)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-21.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Men's Full Sleev T-shirt</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(64)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-22.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slick-single-layout">
                    <div class="axil-product product-style-seven">
                        <div class="product-content">
                            <div class="cart-btn">
                                <a href="cart.html">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="inner">
                                <h5 class="title"><a href="single-product.html">Men's Half Sleev T-shirt</a></h5>
                                <div class="product-price-variant">
                                    <span class="price current-price">$29.99</span>
                                    <span class="price old-price">$49.99</span>
                                </div>
                                <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(94)</span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="{{ asset('frontend_assets') }}/images/product/fashion/product-23.png" alt="Product Images">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End  Best Sellers Product Area  -->
    <!-- Poster Countdown Area  -->
    <div class="axil-poster-countdown">
        <div class="container">
            <div class="poster-countdown-wrap bg-lighter">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="poster-countdown-content">
                            <div class="section-title-wrapper">
                                <span class="title-highlighter highlighter-secondary"> <i class="far fa-shopping-basket"></i> Don’t Miss!!</span>
                                <h2 class="title">Let's Shopping Today</h2>
                            </div>
                            <div class="poster-countdown countdown mb--40"></div>
                            <a href="javascript:void(0)" class="axil-btn btn-bg-primary">Check it Out!</a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="poster-countdown-thumbnail">
                            <img src="{{ asset('frontend_assets') }}/images/product/poster/poster-05.png" alt="Poster Product">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Poster Countdown Area  -->
    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
                <h2 class="title">Explore our Products</h2>
            </div>
            <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-8.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-7.png" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Men's Stylish Hat</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$25.00</span>
                                            <span class="price old-price">$35.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-6.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Women's Stylish Hat</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Solid A Line Dress</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$100.00</span>
                                            <span class="price old-price">$150.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Denim Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$50.00</span>
                                            <span class="price old-price">$89.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Leather Bag</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$99.99</span>
                                            <span class="price old-price">$149.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-2.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Women's Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-1.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Men's Tshirt</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$39.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="row row--15">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-8.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-7.png" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Men's Stylish Hat</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$25.00</span>
                                            <span class="price old-price">$35.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-6.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Women's Stylish Hat</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Solid A Line Dress</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$100.00</span>
                                            <span class="price old-price">$150.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Denim Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$50.00</span>
                                            <span class="price old-price">$89.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Leather Bag</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$99.99</span>
                                            <span class="price old-price">$149.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-2.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Women's Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="{{ asset('frontend_assets') }}/images/product/fashion/product-1.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Men's Tshirt</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$39.99</span>
                                        </div>
                                        <div class="color-variant-wrapper">
                                            <ul class="color-variant">
                                                <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-02"><span><span class="color"></span></span>
                                                </li>
                                                <li class="color-extra-03"><span><span class="color"></span></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                    </div>
                </div>
                <!-- End .slick-single-layout -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->
    <!-- Start Category Wise Product Area  -->
    <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0 pt--0">
        <div class="container ml--xxl-0">
            <!-- Start Category Wise Product Single -->
            <div class="product-area pt--50 pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>Top Fashionable Product</span>
                    <h2 class="title">Fashion</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-1.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Top Handle Handbag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$80</span>
                                        <span class="price current-price">$60</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-2.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-6.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Leather Bag For Men</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
            <!-- End Category Wise Product Single -->
            <!-- Start Category Wise Product Single -->
            <div class="product-area pt--50 pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>Top Electronics Product</span>
                    <h2 class="title">Electronics</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-1.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Top Handle Handbag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$80</span>
                                        <span class="price current-price">$60</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-2.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-6.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Leather Bag For Men</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
            <!-- End Category Wise Product Single -->
            <!-- Start Category Wise Product Single -->
            <div class="product-area pt--50 pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>Top Medicine Product</span>
                    <h2 class="title">Medicine</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-1.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Top Handle Handbag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$80</span>
                                        <span class="price current-price">$60</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-2.png" alt="Product Images">
                                    <img class="hover-img" src="{{ asset('frontend_assets') }}/images/product/fashion/product-6.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Leather Bag For Men</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="{{ asset('frontend_assets') }}/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
            <!-- End Category Wise Product Single -->
        </div>
    </div>
    <!-- End Category Wise Product Area  -->
    @include('frontend.pages.includes.subscribe_form')
@section('frontend_js')
    @if (Session::has('subscriber_form_submit_success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('subscriber_form_submit_success') }}"
            })
        </script>
    @endif
    @if ($errors->any())
        <script>
            Toast.fire({
                icon: 'error',
                title: 'Something Went Wrong try again.'
            })
        </script>
    @endif
@endsection
@endsection
