@php
    $local = app()->getLocale();
@endphp
<!DOCTYPE html>
@if ($local == 'ar')
<html lang="ar" dir="rtl">
@else
<html lang="en" dir="auto">
@endif
<head>
    <!-- Required meta tags -->
    <title> @yield('title') - Nsseb Incubator</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google fonts poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Google fonts playfair -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Google font fajala One -->
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <!-- fonawesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    @if ($local == 'ar')
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
    @else
        <link rel="stylesheet" href="{{ asset('nsseb_assets/css/bootstrap.min.css') }}">
    @endif
    <!-- Bootstrap Toaster CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- venobox css -->
    <link rel="stylesheet" href="{{ asset('nsseb_assets/css/venobox.css') }}">
    <!-- slick slider css -->
    <link rel="stylesheet" href="{{ asset('nsseb_assets/css/slick.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('nsseb_assets/css/style.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('nsseb_assets/css/responsive.css') }}">
    <!-- Arabic CSS Here  -->
    @stack('styles')
    @if ($local == 'ar')
        <link rel="stylesheet" href="{{ asset('nsseb_assets/css/arabic.css') }}">
    @endif
</head>
    <!--HEADER SECTION-->
    <header class="d-flex align-items-center nav-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-3">
                    <div class="logo d-flex justify-content-between align-items-center">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('nsseb_assets/media/images/logo.png') }}" alt="Logo">
                        </a>
                        <i class="fa fa-bars d-md-none" onClick="mobileClick()" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-md-9 d-none d-md-block">
                    <div class="menubar">
                        <ul>
                            <li><a href="{{ route('index') }}">@lang('home.home')</a></li>
                            <li><a href="{{ route('about.us') }}">@lang('home.aboutus')</a></li>
                            <li><a href="{{ route('shop') }}">@lang('home.shop')</a></li>
                            <li><a href="{{ route('services') }}">@lang('home.services')</a></li>
                            <li><a href="{{ route('harmony.match.making') }}">@lang('home.matching_harmony')</a></li>
                            <li><a href="{{ route('organizing.events') }}">@lang('home.event_rganizing')</a></li>
                            {{-- <li><a href="{{ route('contact.us') }}">@lang('home.contact_us')</a></li> --}}
                            @if (Auth::guest())
                                <li class="nav-item dropdown login-dropdown">
                                    <a class="nav-link login-btn" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span> @lang('home.login') &nbsp;<i class="fas fa-chevron-down"></i> </span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('login') }}">@lang('home.login')</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">@lang('home.registeras_user')</a>
                                        <a class="dropdown-item" href="{{ route('vendor.register') }}">@lang('home.registeras_marchent')</a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item dropdown dashboard-dropdown">
                                    <a class="nav-link dash-btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Account</span>
                                        <img height="40" width="40" src="{{ asset('nsseb_assets/media/images/profile_img/default.png') }}" alt="">
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->role == 1)
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">My Account</a>
                                        @endif
                                        @if (Auth::user()->role == 2)
                                            <a class="dropdown-item" href="{{ route('vendor.dashboard') }}">My Account</a>
                                        @endif 
                                        @if(Auth::user()->role == 3)
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">My Account</a>
                                            <a class="dropdown-item" href="{{ route('myorder.create') }}">My Order</a>
                                            <a class="dropdown-item" href="{{ route('my.wishlist') }}">My Wishlist</a></a>
                                            <a class="dropdown-item" href="{{ route('shop') }}">Shop</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        @endif
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                            @if ($local == 'ar')
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" class=""> @lang('home.english') </a>
                                </li>
                            @else
                                <li>
                                    <a class="fw-bold" href="{{ request()->fullUrlWithQuery(['lang' => 'ar']) }}"> @lang('home.arabic') <img width="35px" height="20px" src="{{ asset('nsseb_assets/media/images/ksa-flag.png') }}" alt="flag"> </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--    HEADER SECTION END-->


    <!-- MOBILE MENU-->
    <div id="mobile-menu" class="mobile-menu">
        <!-- accordion-->
        <div class="accordion accordion-flush" id="accordionFlushExample">

            <div class="mobile-logo mb-5">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('nsseb_assets/media/images/logo.png') }}" alt="mobile-logo">
                </a>
                <i id="mobile-cross" class="fa fa-times" onClick="mobileClick()"></i>
            </div>

            <div class="accordion-item custom ">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('index') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            @lang('home.home')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('about.us') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            @lang('home.aboutus')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('shop') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            @lang('home.shop')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('services') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            @lang('home.services')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('harmony.match.making') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            @lang('home.matching_harmony')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('organizing.events') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            @lang('home.event_rganizing')
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#two" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Account
                    </button>
                </h2>
                <div id="two" class="accordion-collapse collapse" aria-labelledby="two" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body custom">
                        <ul>
                            @if (Auth::guest())
                                <li class="nav-item dropdown login-dropdown login-menu">
                                    <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Login &nbsp;<i class="fas fa-chevron-down"></i> </span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('login') }}">@lang('translation.login')</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">Registration</a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item dropdown dashboard-dropdown">
                                    <a class="nav-link dash-btn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Account</span>
                                        <img height="40" width="40" src="{{ asset('nsseb_assets/media/images/profile_img/default.png') }}" alt="">
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->role)
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">My Account</a>    
                                        @else
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">My Account</a> 
                                        @endif
                                        <a class="dropdown-item" href="{{ route('myorder.create') }}">My Order</a>
                                        <a class="dropdown-item" href="{{ route('my.wishlist') }}">My Wishlist</a></a>
                                        <a class="dropdown-item" href="{{ route('shop') }}">Shop</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="mobileOverlay" class="mobile-overlay" onClick="mobileClick()"></div>
    <!--   END MOBILE MENU-->




<body>


@yield('body')


{{-- footer part Here --}}
<footer id="top-footer" class="top-footer main-wrapper">
        <div class="container">
            <div class="footer-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="footer-text">
                            <h3 class="footer-title text-left footer-title-top">@lang('home.aboutus')</h3>
                            <ul>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('about.us') }}"> @lang('home.know_aboutus')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('contact.us') }}"> @lang('home.contact')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('searchresult') }}"> @lang('home.marriage_profile')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('shop') }}"> @lang('home.our_shop')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="footer-text">
                            <h3 class="footer-title text-left">@lang('home.accounts')</h3>
                            <ul>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('index') }}"> @lang('home.home_page') </a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('register') }}"> @lang('home.register_now')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('login') }}"> @lang('home.login_now')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('dashboard') }}"> @lang('home.user_dashboard')</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="footer-text">
                            <h3 class="footer-title text-left">@lang('home.help_center')</h3>
                            <ul>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('services') }}"> @lang('home.services')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('about.us') }}"> @lang('home.know_aboutus')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('contact.us') }}"> @lang('home.contact_us')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('index') }}"> @lang('home.our_blog')</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="footer-text">
                            <h3 class="footer-title text-left">@lang('home.legal_support')</h3>
                            <ul>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('logistics') }}"> @lang('home.logistic_services') </a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('harmony.match.making') }}"> @lang('home.matching_harmony')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('organizing.events') }}"> @lang('home.event_rganizing')</a>
                                </li>
                                <li>
                                    <span><img class="footer-icon" src="{{ asset('nsseb_assets/media/icon/right-arrow.svg') }}" alt=""></span>&nbsp;
                                    <a class="footer-menu" href="{{ route('contact.us') }}"> @lang('home.contact_us')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer id="bottom-footer" class="bottom-footer main-wrapper">
        <div class="container">
            <div class="logo text-center">
                <img class="footer-logo" src="{{ asset('nsseb_assets/media/images/logo.png') }}" alt="">
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-5">
                    <div class="footer-bottom-text">
                        <h5 class="footer-bottom-title">@lang('home.need_help_urgent')</h5>
                        <ul>
                            <li>
                                <span><img class="btm-icon" src="{{ asset('nsseb_assets/media/icon/email.svg') }}" alt=""></span>
                                <p class="email">nseebhr@help.com</p>
                            </li>
                            <li>
                                <span><img class="btm-icon" src="{{ asset('nsseb_assets/media/icon/help-line.svg') }}" alt=""></span>
                                <p class="email"> @lang('home.land_number')</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-5">
                    <div class="footer-bottom-text text-center">
                        <p class="command-text"> @lang('home.footer_article') </p>
                        <div class="social-icon">
                            <span>
                                <a href="#"><img class="icon" src="{{ asset('nsseb_assets/media/icon/facebook.svg') }}" alt=""></a>
                            </span>
                            <span>
                                <a href="#"><img class="icon" src="{{ asset('nsseb_assets/media/icon/twitter.svg') }}" alt=""></a>
                            </span>
                            <span>
                                <a href="#"><img class="icon" src="{{ asset('nsseb_assets/media/icon/bell.svg') }}" alt=""></a>
                            </span>
                            <span>
                                <a href="#"><img class="icon" src="{{ asset('nsseb_assets/media/icon/printerest.svg') }}" alt=""></a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-5">
                    <div class="footer-bottom-text language-selection text-center">
                        <div class="copy-right">
                            <p>@lang('home.copyright')</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <!-- JS code Here ! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- venobox js -->
    <script src="{{ asset('nsseb_assets/js/venobox.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom js -->
    <script src="{{ asset('nsseb_assets/js/custom.js') }}"></script>
    <!-- product viewer plugin -->
    <script src="{{ asset('nsseb_assets/js/zoomsl.min.js') }}"></script>
    <!-- slick slider plugin -->
    <script src="{{ asset('nsseb_assets/js/slick.min.js') }}"></script>
    <!-- Toastr script CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr Scripts render -->
    {!! Notify::message() !!}

       <!-----for Ajax handeling----->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('footer_script')
    @include('components.errors')
    @include('components.validation')

    <script>
        $(document).ready(function(){
            showcartcount();
             showcartsummary();
              showcartcontent();
        });

        function showcartcount(){
            $.ajax({
                url: "{{ route('cart.count') }}",
                success: function(data) {
                    $('.shoppingcartshow').html(data);
                }
            });
        }


        function showcartcontent(){
            $.ajax({
                url: "{{ route('cart.content') }}",
                success: function(data) {
                    $('#cartcontentshow').html(data);
                }
            });
        }


        function showcartsummary(){
            $.ajax({
                url: "{{ route('cart.summary') }}",
                success: function(data) {
                    $('#cartsummaryshow').html(data);
                }
            });
        }


        // Product add to cart uses ajax request
        $('.product_id').on('click',function(e){
            e.preventDefault();
            var product_id = $(this).data('id');

              var url = "{{ route('add_to_cart') }}";

            $.ajax({
                type: "post",
                url: url,
                data: {
                    product_id: product_id
                },
                success: function(data){
                    showcartcount();
                    showcartcontent();
                    showcartsummary();
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.success, 'Product successfully add to Cart', {
                            timeOut: 3000
                        });
                    } else {
                        toastr.error(data.error, {
                            timeOut: 3000
                        });
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        // Product add to cart from details page
        $('#detail_product_id').on('click',function(e){
            e.preventDefault();

            var product_id = $(this).data('id');
            var quantity = $('#quantity').val();
            
            var url = "{{ route('details_add_to_cart') }}";
            $.ajax({
                type: "post",
                url: url,
                data: {
                    product_id: product_id,
                    quantity: quantity,
                },
                success: function(data){
                    showcartcount();
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.success, 'Product successfully add to Cart', {
                            timeOut: 3000
                        });
                    } else {
                        toastr.error(data.error, {
                            timeOut: 3000
                        });
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

            
        });
    </script>

    {{-- Slider for Product Details Page --}}

    <script>
        // Groom Special slider two
        $('.groom-special-slider-two').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            @if ($local == 'ar')
                rtl: true,
            @else
                rtl: false,
            @endif
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }

            ]
        });
        // Women body care slider
        $('.women-body-care-slider2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            @if ($local == 'ar')
                rtl: true,
            @else
                rtl: false,
            @endif
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }

            ]
        });
        // Wedding jewelary slider
        $('.wedding-jewelary-slider2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            @if ($local == 'ar')
                rtl: true,
            @else
                rtl: false,
            @endif
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }

            ]
        });
        // Trending product slider
        $('.trending-product-slider2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            @if ($local == 'ar')
                rtl: true,
            @else
                rtl: false,
            @endif
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }

            ]
        });
        // trending item slider for search result page
        $('.trending-item-slider3').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            @if ($local == 'ar')
                rtl: true,
            @else
                rtl: false,
            @endif
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }

            ]
        });
    </script>

</body>

</html>


