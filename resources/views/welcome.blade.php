<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electronics - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/easyzoom.css') }}">
      <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
    <style>
        .custome-message{
            margin-bottom: 15px;
            font-size: 10px;
            font-weight: bolder;
            color: red;
        }
        .custome-message2{
            font-size: 10px;
            font-weight: bolder;
            color: red;
            margin: 0;
        }
    </style>
</head>

<body>
    @php
        $info=DB::table('sitesettings')->first();
    @endphp

    @if (Request::path() == '/')
        <!--Notification Section-->
        <div class="notification-section notification-section-padding  notification-img ptb-10">
            <div class="container-fluid">
                <div class="notification-wrapper">
                    <div class="notification-pera-graph">
                        <p>Get A big Discount for Gadgets. 10% to 70% Discount for all products. Save money</p>
                    </div>
                    <div class="notification-btn-close">
                        <div class="notification-btn">
                            <a href="{{ url('/category/13') }}">Shop Now</a>
                        </div>
                        <div class="notification-close notification-icon">
                            <button><i class="pe-7s-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header>
            <div class="header-top-wrapper-2 border-bottom-2">
                <div class="header-info-wrapper pl-200 pr-200">
                    <div class="header-contact-info">
                        <ul>
                            
                            @if ($info->email)
                            <li><i class="pe-7s-call"></i> +0{{ $info->phone_one }}</li>
                            @endif
                            @if ($info->email)
                            <li><i class="pe-7s-mail"></i> <a href="mailto:{{ $info->email }}">{{ $info->email }}</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="electronics-login-register">
                        <ul>

                            <li>
                                @if (Auth::guard()->check())
                                    <a href="{{ url('/home') }}" style="font-size: 20px; text-transform:capitalize;color:black;"><i class="pe-7s-users"></i>Hi ! {{ Auth::user()->name }}.</a>
                                @else
                                    <a href="{{ url('/login') }}" style="font-size: 20px; text-transform:capitalize;color:black;">Login | </a>
                                    <a href="{{ url('/register') }}" style="font-size: 20px; text-transform:capitalize;color:black;"> Register</a>
                                @endif
                                
                            
                            </li>
                            @if (Auth::guard()->check())
                            <li><a href="{{ url('/logout') }}" style="font-size: 20px; text-transform:capitalize;color:black;">logout</a></li>
                            <li><a href="{{ url('/wishlist') }}"><i class="pe-7s-like"></i>Wishlist</a></li>
                            @endif

                            <li><a href="#"><i class="pe-7s-flag"></i>US</a></li>
                            <li><a class="border-none" href="#"><span>${{Cart::Subtotal()}} </span>USD</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-bottom pt-40 pb-30 clearfix">
                <div class="header-bottom-wrapper pr-200 pl-200">
                    <div class="logo-3">
                        <a href="{{ url('/') }}">
                            @if($info->logo) <img src="{{ $info->logo }}" alt=""> @endif
                        </a>
                    </div>
                    <div class="categories-search-wrapper">
                        <div class="all-categories">
                            <div class="select-wrapper">
                                <select class="select">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                      <option value="">{{ $category->cat_name }} </option>
                                    @endforeach
                                    
                                
                                </select>
                            </div>
                        </div>
                        <div class="categories-wrapper">
                            <form action="#">
                                <input placeholder="Enter Your key word" type="text">
                                <button type="button"> Search </button>
                            </form>
                        </div>
                    </div>
                    <div class="trace-cart-wrapper">
                        <div class="trace same-style">
                            <div class="same-style-icon">
                                <a href="#"><i class="pe-7s-plane"></i></a>
                            </div>
                            <div class="same-style-text">
                                <a href="#">Product <br>trace</a>
                            </div>
                        </div>
                        <div class="categories-cart same-style">
                            <div class="same-style-icon">
                                <a href="#"><i class="pe-7s-cart"></i></a>
                            </div>
                            <div class="same-style-text">
                                <a href="{{ url('/cart') }}">My Cart <br>({{Cart::count()}}) Item</a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        
                                    </li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="{{ url('/aboutUs') }}">about us</a></li>
                                            {{-- <li><a href="menu-list.html">menu list</a></li> --}}
                                            
                                            @if (Auth::guard()->check())
                                                <li><a href="{{ url('/home') }}">dashboard</a></li> 
                                            @else
                                                <li><a href="{{ url('/login') }}">login</a></li>
                                                <li><a href="{{ url('register') }}">register</a></li> 
                                            @endif
                                            
                                            <li><a href="{{ url('/cart') }}">cart page</a></li>
                                            <li><a href="{{ url('/checkout') }}">checkout</a></li>
                                            <li><a href="{{ url('/wishlist') }}">wishlist</a></li>
                                            <li><a href="{{ url('/contactUs') }}">contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">shop</a>
                                        <ul>
                                            <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                            <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                            <li><a href="shop.html">grid 4 column</a></li>
                                            <li><a href="shop-grid-box.html">grid box style</a></li>
                                            <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                            <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                            <li><a href="shop-list-box.html">list box style</a></li>
                                            <li><a href="product-details.html">tab style 1</a></li>
                                            <li><a href="product-details-2.html">tab style 2</a></li>
                                            <li><a href="product-details-3.html"> tab style 3</a></li>
                                            <li><a href="product-details-4.html">sticky style</a></li>
                                            <li><a href="product-details-5.html">sticky style 2</a></li>
                                            <li><a href="product-details-6.html">gallery style</a></li>
                                            <li><a href="product-details-7.html">gallery style 2</a></li>
                                            <li><a href="product-details-8.html">fixed image style</a></li>
                                            <li><a href="product-details-9.html">fixed image style 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">BLOG</a>
                                        <ul>
                                            <li><a href="blog.html">blog 3 colunm</a></li>
                                            <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact  </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        <div class="pl-200 pr-200 overflow clearfix">
            <div class="categori-menu-slider-wrapper clearfix">
                <div class="categories-menu">
                    <div class="category-heading">
                        <h3> All Departments <i class="pe-7s-angle-down"></i></h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
                            @foreach ($categories as $cat)
                            <li>
                                <a href="{{ url('category/'.$cat->id) }}"><img alt="" src="{{ asset('assets/img/icon-img/5.png') }}">{{ $cat->cat_name }}<i class="pe-7s-angle-right"></i></a>
                              @php
                                  $subcats=DB::table('subcategories')->where('cat_id', $cat->id)->where('subcat_status',1)->limit(4)->get();
                              @endphp
                                <div class="category-menu-dropdown">
                                    @foreach ($subcats as $subcat)
                                    <div class="category-dropdown-style category-common4 mb-40">
        
                                        <h4 class="categories-subtitle"> {{ $subcat->subcat_name }} </h4>
                                        @php
                                            $products =DB::table('products')->where('subcategory_id', $subcat->id)->where('status', 1)->get();
                                        @endphp
                                        <ul>
                                            @foreach ($products as $product)
                                              <li><a href="{{ url('product/details/' .$product->id) }}">{{ $product->product_name }}</a></li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                    
                                    @endforeach
        
                                </div>
                            </li>
                            @endforeach
                            
        
                        </ul>
                    </div>
                </div>
                <div class="menu-slider-wrapper">
                    <div class="menu-style-3 menu-hover text-center">
                        <nav>
                            <ul>
                                <li><a href="index.html">home</a>
                                    
                                </li>
                                <li><a href="#">pages </a>
                                    <ul class="single-dropdown">
                                            <li><a href="{{ url('/aboutUs') }}">about us</a></li>
                                            {{-- <li><a href="menu-list.html">menu list</a></li> --}}
                                            
                                            @if (Auth::guard()->check())
                                                <li><a href="{{ url('/home') }}">dashboard</a></li> 
                                            @else
                                                <li><a href="{{ url('/login') }}">login</a></li>
                                                <li><a href="{{ url('register') }}">register</a></li> 
                                            @endif
                                            
                                            <li><a href="{{ url('/cart') }}">cart page</a></li>
                                            <li><a href="{{ url('/checkout') }}">checkout</a></li>
                                            <li><a href="{{ url('/wishlist') }}">wishlist</a></li>
                                            <li><a href="{{ url('/contactUs') }}">contact</a></li>
                                    </ul>
                                </li>
                                
                                <li><a href="{{ url('/aboutUs') }}">about us</a>
                                    
                                </li>
                                <li><a href="{{ url('/contactUs') }}">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="slider-area">
                        <div class="slider-active owl-carousel">

                            @foreach ($sliders as $slider)
                            <div class="single-slider single-slider-hm3 bg-img pt-170 pb-173" style="background-image: url({{ $slider->image }})">
                                <div class="slider-animation slider-content-style-3 fadeinup-animated">
                                    <h2 class="animated">{!! $slider->title !!}</h2>
                                    <h4 class="animated">{!! $slider->title_two !!}</h4>
                                    <a class="electro-slider-btn btn-hover" href="{{ url('/product/details/46') }}">buy now</a>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="single-slider single-slider-hm3 bg-img pt-170 pb-173" style="background-image: url(assets/img/slider/slider20.jpg)">
                                <div class="slider-animation slider-content-style-3 fadeinup-animated">
                                    <h2 class="animated text-white">Invention of <br>design platform</h2>
                                    <h4 class="animated text-white">Best Product With warranty </h4>
                                    <a class="electro-slider-btn btn-hover" href="product-details.html">buy now</a>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    @else
       <!-- header start -->
       <header>
        <div class="header-top-furniture wrapper-padding-2 res-header-sm">
            <div class="container-fluid">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 furniture-logo ptb-30">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/img/logo/2.png') }}" alt="">
                        </a>
                    </div>
                    <div class="menu-style-2 furniture-menu menu-hover">
                        <nav>
                            <ul>
                                <li><a href="{{ url('/') }}">home</a></li>
                                <li><a href="#">pages</a>
                                    <ul class="single-dropdown">
                                        <li><a href="{{ url('/aboutUs') }}">about us</a></li>
                                            {{-- <li><a href="menu-list.html">menu list</a></li> --}}
                                            
                                            @if (Auth::guard()->check())
                                                <li><a href="{{ url('/home') }}">dashboard</a></li> 
                                            @else
                                                <li><a href="{{ url('/login') }}">login</a></li>
                                                <li><a href="{{ url('register') }}">register</a></li> 
                                            @endif
                                            
                                            <li><a href="{{ url('/cart') }}">cart page</a></li>
                                            <li><a href="{{ url('/checkout') }}">checkout</a></li>
                                            <li><a href="{{ url('/wishlist') }}">wishlist</a></li>
                                            <li><a href="{{ url('/contactUs') }}">contact</a></li>
                                    </ul>
                                </li>
                                
                                <li><a href="{{ url('/contactUs') }}">contact us</a></li>
                                <li><a href="{{ url('/aboutUs') }}">about us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-cart">
                        <a class="icon-cart-furniture" href="{{ url('/cart') }}">
                            <i class="ti-shopping-cart"></i>
                            <span class="shop-count-furniture green">{{Cart::count()}}</span>
                        </a>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        <ul>
                                            <li><a href="index.html">Fashion</a></li>
                                            <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                            <li><a href="index-fruits.html">Fruits</a></li>
                                            <li><a href="index-book.html">book</a></li>
                                            <li><a href="index-electronics.html">electronics</a></li>
                                            <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                            <li><a href="index-food.html">food & drink</a></li>
                                            <li><a href="index-furniture.html">furniture</a></li>
                                            <li><a href="index-handicraft.html">handicraft</a></li>
                                            <li><a href="index-smart-watch.html">smart watch</a></li>
                                            <li><a href="index-sports.html">sports</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="about-us.html">about us</a></li>
                                            <li><a href="menu-list.html">menu list</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="cart.html">cart page</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">shop</a>
                                        <ul>
                                            <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                            <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                            <li><a href="shop.html">grid 4 column</a></li>
                                            <li><a href="shop-grid-box.html">grid box style</a></li>
                                            <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                            <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                            <li><a href="shop-list-box.html">list box style</a></li>
                                            <li><a href="product-details.html">tab style 1</a></li>
                                            <li><a href="product-details-2.html">tab style 2</a></li>
                                            <li><a href="product-details-3.html"> tab style 3</a></li>
                                            <li><a href="product-details-4.html">sticky style</a></li>
                                            <li><a href="product-details-5.html">sticky style 2</a></li>
                                            <li><a href="product-details-6.html">gallery style</a></li>
                                            <li><a href="product-details-7.html">gallery style 2</a></li>
                                            <li><a href="product-details-8.html">fixed image style</a></li>
                                            <li><a href="product-details-9.html">fixed image style 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">BLOG</a>
                                        <ul>
                                            <li><a href="blog.html">blog 3 colunm</a></li>
                                            <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact  </a></li>
                                </ul>
                            </nav>							
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </header>
    <!-- header end -->
    @endif


    @yield('content')


    <footer class="footer-area">
        <div class="footer-top-area bg-img pt-105 pb-65" data-overlay="9">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-3">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title">Custom Service</h3>
                            <div class="footer-widget-content">
                                <ul>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="register.html">My Account</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Track</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-3">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title">Categories</h3>
                            <div class="footer-widget-content">
                                <ul>
                                    <li><a href="shop.html">Dress</a></li>
                                    <li><a href="shop.html">Shoes</a></li>
                                    <li><a href="shop.html">Shirt</a></li>
                                    <li><a href="shop.html">Baby Product</a></li>
                                    <li><a href="shop.html">Mans Product</a></li>
                                    <li><a href="shop.html">Leather</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title">Contact</h3>
                            <div class="footer-newsletter">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is dummy.</p>
                                <div id="mc_embed_signup" class="subscribe-form pr-40">
                                    <form>
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input type="email" value="" name="EMAIL" class="email" placeholder="Enter Your E-mail" required>
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                            <div class="mc-news" aria-hidden="true">
                                                <input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value="">
                                            </div>
                                            <div class="clear">
                                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="footer-contact">
                                     {{-- @if ($info->address) <p><span><i class="ti-location-pin"></i></span> {{ $info->address }} </p> @endif --}}
                                    {{-- <p><span><i class=" ti-headphone-alt "></i></span> @if ($info->phone_one) +880{{ $info->phone_one }}  @endif @if ($info->phone_two) or +880{{ $info->phone_two }} @endif </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            
        </style>
        <div class="footer-bottom black-bg ptb-20">
            <div class="container">
                <div class="row">
                    <style>
                        .custome-tag a{
                            line-height: 3px; background:#050035;color: #fff;font-size: 15px; margin-right: 10px;
                        }
                    </style>
                    <div class="col-12 text-center custome-tag">
                        @if ($info->facebook) <a href="{{ $info->facebook }}" class="btn rounded-circle p-2"><span><i class="ti-facebook"></i></span></a> @endif
                        @if ($info->twitter) <a href="{{ $info->twitter }}" class="btn rounded-circle p-2"><span><i class="ti-twitter"></i></span></a> @endif
                        @if ($info->youtube) <a href="{{ $info->youtube }}" class="btn rounded-circle p-2"><span><i class="ti-youtube"></i></span></a> @endif
                        @if ($info->instagram) <a href="{{ $info->instagram }}" class="btn rounded-circle p-2"><span><i class="ti-instagram"></i></span></a> @endif
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- modal -->
    {{-- <div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="pe-7s-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog modal-compare-width" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="#">
                        <div class="table-content compare-style table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <a href="#">Remove <span>x</span></a>
                                            <img src="assets/img/cart/4.jpg" alt="">
                                            <p>Blush Sequin Top </p>
                                            <span>$75.99</span>
                                            <a class="compare-btn" href="#">Add to cart</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Description </h4></td>
                                        <td class="compare-dec compare-common">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Sku </h4></td>
                                        <td class="product-none compare-common">
                                            <p>-</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Availability  </h4></td>
                                        <td class="compare-stock compare-common">
                                            <p>In stock</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Weight   </h4></td>
                                        <td class="compare-none compare-common">
                                            <p>-</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>Dimensions   </h4></td>
                                        <td class="compare-stock compare-common">
                                            <p>N/A</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>brand   </h4></td>
                                        <td class="compare-brand compare-common">
                                            <p>HasTech</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>color   </h4></td>
                                        <td class="compare-color compare-common">
                                            <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title">
                                            <h4>size    </h4></td>
                                        <td class="compare-size compare-common">
                                            <p>XS, S, M, L, XL, XXL </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"></td>
                                        <td class="compare-price compare-common">
                                            <p>$75.99 </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}






    <!-- all js here -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/ajax-mail.js') }}"></script>  --}}
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
         @endif
      </script>  
</body>

</html>