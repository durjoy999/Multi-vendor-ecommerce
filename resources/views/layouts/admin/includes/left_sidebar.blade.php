<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">


                @if (Auth::guard('admin')->user()->can('dashboard.index'))
                    <li class="@yield('home_active')">
                        <a href="{{ route('admin.home') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('user.all'))
                    <li class="@yield('user_active')">
                        <a href="{{ route('admin.user.index') }}">
                            <i data-feather="users"></i>
                            <span data-key="t-dashboard">Customers</span>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('brand.all'))
                    <li class="@yield('brand_active')">
                        <a href="{{ route('admin.brand.index') }}">
                            <i data-feather="grid"></i>
                            <span data-key="t-dashboard">Brand Management</span>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('category.all') || Auth::guard('admin')->user()->can('subCategory.all') || Auth::guard('admin')->user()->can('childCategory.all'))
                    <li class="@yield('category_management')">
                        <a href="javascript: void(0);" class="has-arrow" >
                            <i data-feather="x-square"></i>
                            <span data-key="t-ecommerce">Category Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('category.all'))
                                <li><a class="@yield('category_active')" href="{{ route('admin.category.index') }}">Categories</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('subCategory.all'))
                                <li><a class="@yield('subcategory_active')" href="{{ route('admin.subCategory.index') }}">Sub Categories</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('childCategory.all'))
                                <li><a class="@yield('childcategory_active')" href="{{ route('admin.childCategory.index') }}">Child Categories</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('product.all'))
                    <li class="@yield('product_management')">
                        <a href="javascript: void(0);" class="has-arrow" >
                            <i data-feather="shopping-bag"></i>
                            <span>Product Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('product.all'))
                                <li><a class="@yield('product_active')" href="{{ route('admin.product.index') }}">All Products</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('productAttribute.all'))
                                <li><a class="@yield('product_active')" href="{{ route('admin.productAttribute.index') }}">Attributes</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('tax.all'))
                    <li class="@yield('ecommerce_active')">
                        <a href="javascript: void(0);" class="has-arrow" >
                            <i data-feather="shopping-cart"></i>
                            <span>E-commerce</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('tax.all'))
                                <li><a class="@yield('tax_active')" href="{{ route('admin.tax.index') }}">All Tax</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('coupon.all'))
                                <li><a class="@yield('coupon_active')" href="{{ route('admin.coupon.index') }}">All Coupons</a></li>
                            @endif
                        </ul>
                @endif
                @if (Auth::guard('admin')->user()->can('slider.all'))
                    <li class="@yield('Frontend_active')">
                        <a href="javascript: void(0);" class="has-arrow" >
                            <i data-feather="shopping-cart"></i>
                            <span>Frontend</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('slider.all'))
                                <li><a class="@yield('slider_active')" href="{{ route('admin.slider.index') }}">All Slider</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('heroProduct.index'))
                                <li><a class="@yield('hero_product_active')" href="{{ route('admin.heroProduct.edit') }}">Hero Product</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('subscribe.index'))
                                <li><a class="@yield('subscribe_active')" href="{{ route('admin.subscribe.index') }}">All Subscribe</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('contact.all'))
                                <li><a class="@yield('contact_active')" href="{{ route('admin.contact.index') }}">All Contact</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('faq.all'))
                                <li><a class="@yield('faq_active')" href="{{ route('admin.faq.index') }}">FAQ</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('quickLink.all'))
                                <li><a class="@yield('quicklinks_active')" href="{{ route('admin.quickLink.index') }}">Quick Link</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('team.all'))
                                <li><a class="@yield('team_active')" href="{{ route('admin.team.index') }}">Team</a></li>
                            @endif
                             @if (Auth::guard('admin')->user()->can('userMassage.all'))
                                <li><a class="@yield('massage_active')" href="{{ route('admin.userMassage.index') }}">Ticket</a></li>
                            @endif
                        </ul>
                @endif
                @if (Auth::guard('admin')->user()->can('admin.index') || Auth::guard('admin')->user()->can('role.index'))
                    <li class="@yield('admin_active')">
                        <a href="javascript: void(0);" class="has-arrow" >
                            <i data-feather="users"></i>
                            <span data-key="t-ecommerce">Admin Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('admin.index'))

                            <li><a class="@yield('admin_admin_active')" href="{{ route('admin.admin.index') }}" key="t-products"><i data-feather="user"></i>Admins</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('role.index'))

                            <li><a class="@yield('admin_roles_active')" href="{{ route('admin.roles.index') }}" data-key="t-product-detail"><i data-feather="user"></i>Roles</a></li>
                            @endif

                        </ul>
                    </li>
                @endif


                @if (Auth::guard('admin')->user()->can('generalSettings.index') || Auth::guard('admin')->user()->can('configSettings.index'))
                    <li class="@yield('settings_active')">
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-ecommerce">Settings</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('generalSettings.index'))

                            <li><a class="@yield('settings_general_active')" href="{{ route('admin.settings.general') }}"> <i data-feather="settings"></i>General</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('configSettings.index'))

                            <li><a class="@yield('settings_config_active')" href="{{ route('admin.settings.config') }}"> <i data-feather="settings"></i>Config</a></li>
                            @endif



                        </ul>
                    </li>
                @endif



                </li>


        </div>
        <!-- Sidebar -->
    </div>
</div>
