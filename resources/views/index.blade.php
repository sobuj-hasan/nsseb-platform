@php
    $local = app()->getLocale();
@endphp
@extends('layouts.nsseb')
@section('title', 'Home')
@section('body')
    <!-- Header part start -->
    <header id="header" class="main-wrapper">
        <div class="index-banner pt-lg-5">
            <div class="banner-overlay">
                <div class="banner-content shop-home">
                    <div class="order-item">
                        <div class="order-btn">
                            <a class="" href="{{ route('cart') }}">
                                <i class="fas fa-shopping-cart"></i> &nbsp; @lang('home.order')
                                <span class="number-count">
                                    <div class="shoppingcartshow">
                                        
                                    </div>
                                </span>
                            </a>
                        </div>
                        <div class="wishlist-btn">
                            <a class="" href="{{ route('dashboard') }}">
                                <i class="far fa-heart"></i> &nbsp; @lang('home.wishlist')
                                <span class="number-count"><p> {{ App\Models\Wishlist::where('user_id', Auth::id() ?? '')->count() }} </p></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="banner-div">
                        <div class="banner-text mt-2">
                            <h1><strong class="bold-text">@lang('home.we_help_to')</strong></h1>
                            {{-- <h5 class="banner-top-text">@lang('home.nsseb_platform')</h5> --}}
                            <h5 class="banner-bottom-text">@lang('home.find_life_partner')</h5>
                        </div>
                        <div class="banner-search">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-5 col-xs-6">
                                    <div class="mid-text">
                                        @lang('home.iam')
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="input-group">
                                        <select id="inputState" class="custom-input">
                                            <option class="select-text" selected> @lang('home.man') </option>
                                            <option class="select-text"> @lang('home.women') </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-7 col-xs-6">
                                    <div class="mid-text-uniq">
                                        @lang('home.looking_for')
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="input-group">
                                        <select id="inputState" class="custom-input-uniq">
                                            <option class="select-text" selected> @lang('home.women') </option>
                                            <option class="select-text"> @lang('home.man') </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-left mt-4 mb-0">
                                <div class="default-btn mr-2">
                                    <a href="{{ route('searchresult') }}">@lang('home.find_partner')</a>
                                </div>
                                <div class="default-btn ml-2">
                                    <a href="{{ route('services') }}">@lang('home.view_more_services')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-bottom">
            </div>
        </div>
    </header>
    <!-- Header part End -->

    <!-- Wedding shop part Here -->
    <div id="wedding" class="wedding main-wrapper">
        <div class="container">
            <div class="wedding-header">
                <h3>@lang('home.your_wedding_shop')</h3>
            </div>
            <div class="row pt-4 wedding-shop-slider">
                @foreach ($wedding_products as $product)
                    @include('nsseb_components/wedding_shop')
                @endforeach
                @empty($product)
                    <div class="text-danger">Nothig to show Product...</div>
                @endempty
            </div>
        </div>
    </div>

    <!-- Video Section part start -->
    {{-- <div id="video-section" class="video-section main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="video-player">
                        <div class="play-icon">
                            <a class="venobox" data-autoplay="true" data-vbtype="video"
                                href="https://youtu.be/ollH45NDXu0">
                                <img class="icon" src="{{ asset('nsseb_assets/media/icon/video-player.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="video-article">
                        <h3>@lang('home.how_to_find')</h3>
                        <h5>@lang('home.life_partner')</h5>
                        <p>@lang('home.how_to_find_article1')</p>
                        <p>@lang('home.how_to_find_article2')</p>
                        <p>@lang('home.how_to_find_article3')</p>
                        <p>@lang('home.how_to_find_article4')</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Wedding Hall part Here -->
    <div id="wedding" class="wedding main-wrapper pt-lg-5">
        <div class="container">
            <div class="wedding-header">
                <h3 class="text-left">@lang('home.wedding_hall')</h3>
            </div>
            <div class="row pt-4 wedding-shop-slider">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                    <div class="product-box">
                        <div class="img-box">
                            <a href="">
                                <img class="product-img" src="{{ asset('nsseb_assets/media/images/auditorium1.jpg') }}" alt="">
                            </a>
                        </div>
                        <h5 class="text-left mt-2" style="font-size: 14px; line-height: 15px;">@lang('home.your_best_choice_for_reservation')</h5>
                        <a href="">
                            <h6>@lang('home.luxury_wedding_halls')</h6>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                    <div class="product-box">
                        <div class="img-box">
                            <a href="">
                                <img class="product-img" src="{{ asset('nsseb_assets/media/images/auditorium2.jpg') }}" alt="">
                            </a>
                        </div>
                        <h5 class="text-left mt-2" style="font-size: 14px; line-height: 15px;">@lang('home.your_best_choice_for_reservation')</h5>
                        <a href="">
                            <h6>@lang('home.large_wedding_halls')</h6>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                    <div class="product-box">
                        <div class="img-box">
                            <a href="">
                                <img class="product-img" src="{{ asset('nsseb_assets/media/images/auditorium3.jpg') }}" alt="">
                            </a>
                        </div>
                        <h5 class="text-left mt-2" style="font-size: 14px; line-height: 15px;">@lang('home.your_best_choice_for_reservation')</h5>
                        <a href="">
                            <h6>@lang('home.marriage_wedding_halls')</h6>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                    <div class="product-box">
                        <div class="img-box">
                            <a href="">
                                <img class="product-img" src="{{ asset('nsseb_assets/media/images/auditorium1.jpg') }}" alt="">
                            </a>
                        </div>
                        <h5 class="text-left mt-2" style="font-size: 14px; line-height: 15px;">@lang('home.your_best_choice_for_reservation')</h5>
                        <a href="">
                            <h6>@lang('home.luxury_wedding_halls')</h6>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                    <div class="product-box">
                        <div class="img-box">
                            <a href="">
                                <img class="product-img" src="{{ asset('nsseb_assets/media/images/auditorium2.jpg') }}" alt="">
                            </a>
                        </div>
                        <h5 class="text-left mt-2" style="font-size: 14px; line-height: 15px;">@lang('home.your_best_choice_for_reservation')</h5>
                        <a href="">
                            <h6>@lang('home.large_wedding_halls')</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wedding Couch part Here -->
    <div id="wedding" class="wedding main-wrapper pt-lg-5">
        <div class="container">
            <div class="wedding-header">
                <h3 class="text-left">@lang('home.wedding_couch')</h3>
            </div>
            <div class="row pt-4 wedding-shop-slider">
                @forelse ($wedding_couch as $product)
                    @include('nsseb_components/wedding_shop')
                    @empty
                    <div class="text-danger">Nothig to show wedding Couch Product...</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Marriage Offers part Here -->
    <div id="wedding" class="wedding main-wrapper pt-lg-5 pb-lg-5">
        <div class="container pb-3">
            <div class="wedding-header">
                <h3 class="text-left">@lang('home.marriage_offer')</h3>
            </div>
            <div class="row pt-4 wedding-shop-slider">
                @foreach ($marriage_profile as $profile)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                        <div class="product-box">
                            <div class="img-box" style="border-radius: 5px;">
                                <a href="{{ route('profile', $profile->id) }}">
                                    <img style="border-radius: 5px;" class="product-img" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $profile->profile_photo }}" alt="">
                                </a>
                            </div>
                            <h5 style="font-size: 14px; line-height: 12px; margin-top: 10px;">{{ $profile->living_place ?? "Location" }}</h5>
                            <a href="{{ route('profile', $profile->id) }}">
                                <h6>{{ $profile->name }}</h6>
                            </a>
                        </div>
                    </div>
                @endforeach
                @empty($profile)
                    <div class="text-danger">Nothig to show marriage profile...</div>
                @endempty
            </div>
        </div>
    </div>

    <!-- App download part -->
    <div id="apps-download" class="apps-download main-wrapper pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="apps-down-article">
                        <h3>@lang('home.android_ios')</h3>
                        <h5>@lang('home.mobile_app')</h5>
                        <p>@lang('home.mobile_app_article')</p>
                        <div class="download-btn">
                            <a target="_blank" href="https://play.google.com/store"><img class="google" src="{{ asset('nsseb_assets/media/images/google-playstore.png') }}" alt=""></a>
                            <a target="_blank" href="https://play.google.com/store"><img class="apple" src="{{ asset('nsseb_assets/media/images/apple-playstore.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="download-img">
                        <!-- Image from css -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Reconmendation part  -->
    {{-- <div id="recommendation" class="recommendation main-wrapper">
        <div class="container pt-5">
            <div class="row">
                @foreach ($recommend_blog as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="read-box">
                            <h4>{{ Str::limit($blog->title, 20, $end='..') }}</h4>
                            <p class="mini-title">Take care your partner</p>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                            <div class="read-btn">
                                <a class="read" href="{{ route('blogdetails', $blog->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @empty($blog)
                    <h5 class="text-danger">Nothing to show any Recommendations..</h5>
                @endempty
            </div>
        </div>
    </div> --}}

    <!-- Our Blog part -->
    {{-- <div id="blog" class="blog">
        <div class="container">
            <h3>Our Blog</h3>
            <div class="blog-text">
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit
                mollit. Exercitation veniam consequat sunt nostrud amet.</p>
            </div>
            
            @include('nsseb_components.blogpart')

        </div>
    </div> --}}

    <!-- Testimonial part  -->
    {{-- @include('nsseb_components.testimonial') --}}

@endsection

@section('footer_script')
    <script>
        $('.wedding-shop-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            @if ($local == 'ar')
                rtl: true,
            @else
                rtl: false,
            @endif
            autoplay: true,
            autoplaySpeed: 1000,
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
    
@endsection


