<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from new.BIR it.com/demo/template/etrade/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Oct 2022 05:24:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Home</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets') }}/images/favicon.png">
    <!-- CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/bootstrap.min.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/font-awesome.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/flaticon/flaticon.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/slick.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/slick-theme.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/jquery-ui.min.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/sal.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/magnific-popup.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/vendor/base.css"> <!-- Don't edit this file -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.min.css"> <!-- Don't edit this file -->

    <!-- Write your own css in custom.css -->
    <!-- <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/custom.css"> -->

</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    @if ( Request::path()  == '/')
    <header class="header axil-header header-style-2">
        <div class="header-top-campaign">
            <div class="container position-relative">
                <div class="campaign-content">
                    <div class="campaign-countdown"></div>
                    <p>Open Doors To A World Of Fashion Get <a href="javascript:void(0)">Get Your Offer</a></p>
                </div>
            </div>
            <button class="remove-campaign"><i class="fal fa-times"></i></button>
        </div>
        <!-- Start Header Top Area  -->
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-3 col-5">
                        <div class="header-brand">
                            <a href="{{ route('frontend.home') }}" class="logo logo-dark">
                                <img src="{{ asset('frontend_assets') }}/images/logo/logo.png" alt="Site Logo">
                            </a>
                            <a href="{{ route('frontend.home') }}" class="logo logo-light">
                                <img src="{{ asset('frontend_assets') }}/images/logo/logo-light.png" alt="Site Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-7">
                        <div class="header-top-dropdown dropdown-box-style">
                            <div class="axil-search">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="far fa-search"></i>
                                </button>
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for...." autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area  -->
        <!-- Start Mainmenu Area  -->
        <div class="axil-mainmenu aside-category-menu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-nav-department">
                        <aside class="header-department">
                            <button class="header-department-text department-title">
                                <span class="icon"><i class="fal fa-bars"></i></span>
                                <span class="text">Categories</span>
                            </button>
                            <nav class="department-nav-menu">
                                <button class="sidebar-close"><i class="fas fa-times"></i></button>
                                <ul class="nav-menu-list">
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-01.png" alt="Department"></span>
                                            <span class="menu-text">Fashion</span>
                                        </a>
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Men</h3>
                                                        <ul>
                                                            <li><a href="shop.html">T-shirts</a></li>
                                                            <li><a href="shop-sidebar.html">Shirts</a></li>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                        </ul>
                                                        <h3 class="submenu-heading">Baby</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Baby Cloths</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Gear</a></li>
                                                            <li><a href="shop.html">Baby Toddler</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Toys</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Women</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                            <li><a href="shop-sidebar.html">T-shirts</a></li>
                                                            <li><a href="shop.html">Shirts</a></li>
                                                            <li><a href="shop.html">Tops</a></li>
                                                            <li><a href="shop-sidebar.html">Jumpsuits</a></li>
                                                            <li><a href="shop.html">Coats</a></li>
                                                            <li><a href="shop-sidebar.html">Sweater</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Accessories</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Handbag</a></li>
                                                            <li><a href="shop.html">Shoes</a></li>
                                                            <li><a href="shop.html">Wallets</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-02.png" alt="Department"></span>
                                            <span class="menu-text">Electronics</span>
                                        </a>
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Men</h3>
                                                        <ul>
                                                            <li><a href="shop.html">T-shirts</a></li>
                                                            <li><a href="shop-sidebar.html">Shirts</a></li>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                        </ul>
                                                        <h3 class="submenu-heading">Baby</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Baby Cloths</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Gear</a></li>
                                                            <li><a href="shop.html">Baby Toddler</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Toys</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Women</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                            <li><a href="shop-sidebar.html">T-shirts</a></li>
                                                            <li><a href="shop.html">Shirts</a></li>
                                                            <li><a href="shop.html">Tops</a></li>
                                                            <li><a href="shop-sidebar.html">Jumpsuits</a></li>
                                                            <li><a href="shop.html">Coats</a></li>
                                                            <li><a href="shop-sidebar.html">Sweater</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Accessories</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Handbag</a></li>
                                                            <li><a href="shop.html">Shoes</a></li>
                                                            <li><a href="shop.html">Wallets</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-03.png" alt="Department"></span>
                                            <span class="menu-text">Home Decor</span>
                                        </a>
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Men</h3>
                                                        <ul>
                                                            <li><a href="shop.html">T-shirts</a></li>
                                                            <li><a href="shop-sidebar.html">Shirts</a></li>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                        </ul>
                                                        <h3 class="submenu-heading">Baby</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Baby Cloths</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Gear</a></li>
                                                            <li><a href="shop.html">Baby Toddler</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Toys</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Women</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                            <li><a href="shop-sidebar.html">T-shirts</a></li>
                                                            <li><a href="shop.html">Shirts</a></li>
                                                            <li><a href="shop.html">Tops</a></li>
                                                            <li><a href="shop-sidebar.html">Jumpsuits</a></li>
                                                            <li><a href="shop.html">Coats</a></li>
                                                            <li><a href="shop-sidebar.html">Sweater</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Accessories</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Handbag</a></li>
                                                            <li><a href="shop.html">Shoes</a></li>
                                                            <li><a href="shop.html">Wallets</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-04.png" alt="Department"></span>
                                            <span class="menu-text">Medicine</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-05.png" alt="Department"></span>
                                            <span class="menu-text">Furniture</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-06.png" alt="Department"></span>
                                            <span class="menu-text">Crafts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-07.png" alt="Department"></span>
                                            <span class="menu-text">Accessories</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="nav-link">
                                            <span class="menu-icon"><img src="{{ asset('frontend_assets') }}/images/product/categories/cat-08.png" alt="Department"></span>
                                            <span class="menu-text">Camera</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </aside>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="{{ asset('frontend_assets') }}/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="{{ route('frontend.home') }}" class="active">Home</a></li>
                                <li><a href="{{ route('frontend.shop') }}">Shop</a></li>
                                <li><a href="{{ route('frontend.about') }}">About</a></li>
                                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-sm-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="cart.html" class="cart-dropdown-btn">
                                    <span class="cart-count">3</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    @if (Auth::guard('web')->check())
                                        <span class="title">Mahmudun Nabi Kajal</span>
                                        <ul>
                                            <li>
                                                <a href="my-account.html">My Account</a>
                                            </li>
                                        </ul>
                                        <a class="axil-btn btn-bg-primary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <div class="login-btn">
                                            <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">Login</a>
                                        </div>
                                        <div class="reg-footer text-center">No account yet? <a href="{{ route('register') }}" class="btn-link">REGISTER HERE.</a></div>
                                    @endif


                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area  -->
    </header>
    @else
    <header class="header axil-header header-style-5">

        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="{{ route('frontend.home') }}" class="logo logo-dark">
                            <img src="{{ asset('frontend_assets') }}/images/logo/logo.png" alt="Site Logo">
                        </a>
                        <a href="{{ route('frontend.home') }}" class="logo logo-light">
                            <img src="{{ asset('frontend_assets') }}/images/logo/logo-light.png" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="{{ route('frontend.home') }}" class="logo">
                                    <img src="{{ asset('frontend_assets') }}/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="{{ route('frontend.home') }}">Home</a> </li>
                                <li><a href="{{ route('frontend.shop') }}">Shop</a> </li>
                                <li><a href="{{ route('frontend.about') }}">About</a></li>
                                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-xl-block d-none">
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for?" autocomplete="off">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </button>
                            </li>
                            <li class="axil-search d-xl-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <span class="cart-count">3</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title">Short Profile</span>
                                    @if (Auth::guard('web')->check())
                                        <ul>
                                            <span class="title">Mahmudun Nabi Kajal</span>
                                            <li>
                                                <a href="my-account.html">My Account</a>
                                            </li>
                                        </ul>

                                            <a class="axil-btn btn-bg-primary" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    @else
                                    <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">Login</a>
                                    <div class="reg-footer text-center">No account yet? <a href="{{ route('register') }}" class="btn-link">REGISTER HERE.</a></div>
                                    @endif

                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
        <div class="header-top-campaign">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-10">
                        <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                            <div class="slick-slide">
                                <div class="campaign-content">
                                    <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                                </div>
                            </div>
                            <div class="slick-slide">
                                <div class="campaign-content">
                                    <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endif

    <main class="main-wrapper">
        @yield('frontend_content')
    </main>
    <div class="service-area">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('frontend_assets') }}/images/icons/service1.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                            <p>Tell about your service.{{ Request::path() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('frontend_assets') }}/images/icons/service2.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Money Back Guarantee</h6>
                            <p>Within 10 days.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('frontend_assets') }}/images/icons/service3.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">24 Hour Return Policy</h6>
                            <p>No question ask.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('frontend_assets') }}/images/icons/service4.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Pro Quality Support</h6>
                            <p>24/7 Live support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Support</h5>
                            <!-- <div class="logo mb--30">
                            <a href="index.html">
                                <img class="light-logo" src="{{ asset('frontend_assets') }}/images/logo/logo.png" alt="Logo Images">
                            </a>
                        </div> -->
                            <div class="inner">
                                <p>House#27, Road#09, Sector#11, Uttara, Dhaka - 1230, Bangladesh</p>
                                <ul class="support-list-item">
                                    <li><a href="mailto:biritofficial@gmail.com"><i class="fal fa-envelope-open"></i>biritofficial@gmail.com</a></li>
                                    <li><a href="tel:+8801708338194"><i class="fal fa-phone-alt"></i> (+88)01708338194</a></li>
                                    <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Account</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="sign-up.html">Login / Register</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Quick Link</h5>
                            <div class="inner">
                                <ul>
                                  @foreach (quickLinks() as $quickLink)
                                      <li><a href="{{ route('frontend.quickLink',$quickLink->slug) }}">{{ $quickLink->title }}</a></li>
                                  @endforeach
                                      <li><a href="{{ route('frontend.contact')}}">Contact</a></li>
                                      <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Download App</h5>
                            <div class="inner">
                                <span>Save $3 With App & New User only</span>
                                <div class="download-btn-group">
                                    <div class="qr-code">
                                        <img src="{{ asset('frontend_assets') }}/images/others/qr.png" alt="BIR it">
                                    </div>
                                    <div class="app-link">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('frontend_assets') }}/images/others/app-store.png" alt="App Store">
                                        </a>
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('frontend_assets') }}/images/others/play-store.png" alt="Play Store">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="social-share">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://discord.com/"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>© 2022. All rights reserved by <a target="_blank" href="https://birit.com.bd/">BIR it</a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{ asset('frontend_assets') }}/images/icons/cart/cart-1.png" alt="paypal cart"></li>
                                <li><img src="{{ asset('frontend_assets') }}/images/icons/cart/cart-2.png" alt="paypal cart"></li>
                                <li><img src="{{ asset('frontend_assets') }}/images/icons/cart/cart-5.png" alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Area  -->
    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-big-01.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('frontend_assets') }}/images/product/product-big-01.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-big-02.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('frontend_assets') }}/images/product/product-big-02.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-big-03.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('frontend_assets') }}/images/product/product-big-03.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-big-01.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('frontend_assets') }}/images/product/product-big-01.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-big-02.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('frontend_assets') }}/images/product/product-big-02.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-big-03.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="{{ asset('frontend_assets') }}/images/product/product-big-03.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-thumb/thumb-08.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-thumb/thumb-07.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-thumb/thumb-09.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-thumb/thumb-08.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-thumb/thumb-07.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="{{ asset('frontend_assets') }}/images/product/product-thumb/thumb-09.png" alt="thumb image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="{{ asset('frontend_assets') }}/images/icons/rate.png" alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="single-product.html">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Table</h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li class="text-danger"><i class="fal fa-times"></i>Stock Out</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi pretium. Integer ante est, elementum eget magna. Pellentesque sagittis dictum libero, eu dignissim tellus.</p>
                                        <form action="cart.html">
                                            <div class="product-variations-wrapper">
                                                <!-- Start Product Variation  -->
                                                <div class="product-variation">
                                                    <h6 class="title">Colors:</h6>
                                                    <select name="p-color" id="p-color">
                                                        <option value="Red">Red</option>
                                                        <option value="Green">Green</option>
                                                        <option value="Blue">Blue</option>
                                                    </select>
                                                    <!-- <div class="color-variant-wrapper">
                                                        <ul class="color-variant mt--0">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </div>
                                                <!-- End Product Variation  -->
                                                <!-- Start Product Variation  -->
                                                <div class="product-variation">
                                                    <h6 class="title">Size:</h6>
                                                    <select name="p-size" id="p-size">
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>
                                                    <!-- <ul class="range-variant">
                                                        <li>xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul> -->
                                                </div>
                                                <!-- End Product Variation  -->
                                            </div>
                                            <!-- Start Product Action Wrapper  -->
                                            <div class="product-action-wrapper d-flex-center">
                                                <!-- Start Quentity Action  -->
                                                <div class="pro-qty">
                                                    <input type="number" name="p-quantity" value="1">
                                                </div>
                                                <!-- End Quentity Action  -->
                                                <!-- Start Product Action  -->
                                                <ul class="product-action d-flex-center mb--0">
                                                    <li class="add-to-cart">
                                                        <button type="submit" class="axil-btn btn-bg-primary">Add to Cart</button>
                                                    </li>
                                                    <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                                <!-- End Product Action  -->
                                            </div>
                                        </form>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->
    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control" name="prod-search" id="prod-search" placeholder="Write Something....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title">24 Result Found</h6>
                    <a href="shop.html" class="view-all">View All</a>
                </div>
                <div class="psearch-results">
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="{{ asset('frontend_assets') }}/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="{{ asset('frontend_assets') }}/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/popper.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/slick.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/js.cookie.js"></script>
    <!-- <script src="{{ asset('frontend_assets') }}/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/jquery-ui.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/sal.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/counterup.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/vendor/waypoints.min.js"></script>
    <script src="{{ asset('admin_assets') }}/js/sweetalert2.all.min.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontend_assets') }}/js/main.js"></script>

    <script>
        const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000,
         timerProgressBar: true,
         didOpen: (toast) => {
           toast.addEventListener('mouseenter', Swal.stopTimer)
           toast.addEventListener('mouseleave', Swal.resumeTimer)
         }
       })
    </script>
    <script>
        (function (window, document, $, undefined) {
            'use strict';
            var axilInit = {
                i: function (e) {
                    axilInit.s();
                    axilInit.methods();
                },
                s: function (e) {
                    this._window = $(window),
                        this._document = $(document),
                        this._body = $('body'),
                        this._html = $('html')
                },
                methods: function (e) {
                    axilInit.countdownInit('.poster-countdown', '2023/10/01');
                },
                countdownInit: function (countdownSelector, countdownTime) {
                    var eventCounter = $(countdownSelector);
                    if (eventCounter.length) {
                        eventCounter.countdown(countdownTime, function (e) {
                            $(this).html(
                                e.strftime(
                                    "<div class='countdown-section'><div><div class='countdown-number'>%-D</div> <div class='countdown-unit'>Day</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%H</div> <div class='countdown-unit'>Hrs</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%M</div> <div class='countdown-unit'>Min</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%S</div> <div class='countdown-unit'>Sec</div> </div></div>"
                                )
                            );
                        });
                    }
                },
            }
            axilInit.i();
        })(window, document, jQuery);
    </script>
     @yield('frontend_js')
</body>

</html>
