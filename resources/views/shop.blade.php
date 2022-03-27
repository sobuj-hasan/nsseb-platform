@php
    $local = app()->getLocale();
@endphp
@extends('layouts.nsseb')
@section('title', 'Shop Page')
@section('body')
    <header id="shop-header" class="shop-header main-wrapper">
        <div class="shop-banner-img py-5">
            <div class="shop-banner-bottom">
                <!-- banner bottom here -->
            </div>
            <div class="banner-content shop-home">
                <div class="order-item">
                    <div class="order-btn">
                        <a class="" href="{{ route('cart') }}">
                            <i class="fas fa-shopping-cart"></i> &nbsp; @lang('home.order')
                            <span class="number-count">
                                <div class="shoppingcartshow"></div>
                            </span>
                        </a>
                    </div>
                    <div class="wishlist-btn">
                        <a class="" href="{{ route('my.wishlist') }}">
                            <i class="far fa-heart"></i> &nbsp; @lang('home.wishlist')
                            <span class="number-count"><p> {{ App\Models\Wishlist::where('user_id', Auth::id() ?? '')->count() }} </p></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="shop-banner-text">
                <div class="container">
                    <div class="shop-banner-article">
                        <h1>@lang('home.lovely_dream')</h1>
                        <p>@lang('home.lovely_dream_article')</p>
                        <div class="btn-area mb-3">
                            <div class="shop-btn">
                                <a href="{{ route('shop') }}">@lang('home.shop_now')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part End -->

    <!-- Category Part Here -->
    <div id="category" class="wedding category">
        <div class="container">
            <div class="wedding-shop-wrapper category-wrapper">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <div class="category-part">
                            <div class="category-header">
                                <h3>@lang('home.category')</h3>
                            </div>
                            <div class="single-category">
                                <ul>
                                    @foreach ($categories as $category)
                                        @if ($local == 'ar')
                                            <li>
                                                <a href="{{ route('category.wise.shop', $category->id) }}">{{ $category->ar_name }}</a>
                                                <span><i class="fas fa-chevron-right right-icon"></i></span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('category.wise.shop', $category->id) }}">{{ $category->name }}</a>
                                                <span><i class="fas fa-chevron-right right-icon"></i></span>
                                            </li>
                                        @endif
                                    @endforeach
                                    @empty($category)
                                        <div class="text-danger">
                                            No categories available for display...
                                        </div>
                                    @endempty
                                </ul>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <div class="product-show">
                            <div class="row m-auto">
                                @foreach ($new_products as $latest_product)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="product-box">
                                            <div class="img-box">
                                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                                    <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $latest_product->image }}" alt="">
                                                </a>
                                                <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                                    <div class="cart-icon">
                                                        <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                                    </div>
                                                </a>
                                                {{-- <a href="#" class="wish_id" data-id="{{ $latest_product->id }}">
                                                    <div class="wish-icon">
                                                        <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                                    </div>
                                                </a> --}}
                                                <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                                    @csrf
                                                    <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                                    <div style="cursor: pointer" onclick="document.getElementById('wishlist').submit();" class="wish-icon">
                                                        <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                                    </div>
                                                </form>
                                            </div>
                                            <a href="{{ route('productdetails', $latest_product->id) }}">
                                                <h6>{{ $latest_product->name }}</h6>
                                            </a>
                                            <h5>{{ $latest_product->price }} @lang('home.currency')</h5>
                                        </div>
                                    </div>
                                @endforeach
                                @empty($latest_product)
                                    <div class="text-danger">Nothig to show Products....</div>
                                @endempty
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Groom Special shop part Here -->
    <div id="wedding-shop" class="wedding wedding-shop">
        <div class="container">
            <div class="wedding-shop-wrapper pt-5">
                <h3 class="">@lang('home.groom_special')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto groom-special-slider">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                        <div style="cursor: pointer" onclick="document.getElementById('wishlist').submit();" class="wish-icon">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                </div>
                                <a href="{{ route('productdetails', $product->id) }}">
                                    <h6>{{ $product->name }}</h6>
                                </a>
                                <h5>{{ $product->price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($product)
                        <div class="text-danger">Nothig to show Products....</div>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <!-- Women body Care shop part Here -->
    <div id="wedding-shop" class="wedding wedding-shop women-shop">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.women_boy_care')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto women-body-care-slider">
                    @foreach ($latest_products as $latest_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $latest_product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $latest_product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                        <div style="cursor: pointer" onclick="document.getElementById('wishlist').submit();" class="wish-icon">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                </div>
                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                    <h6>{{ $latest_product->name }}</h6>
                                </a>
                                <h5>{{ $latest_product->price }} hr</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($latest_product)
                        <div class="text-danger">Nothig to show Products....</div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
    <!-- Weekend discount Part -->
    @include('nsseb_components.weekend_discount')

    <!-- Jewellery shop part Here -->
    <div id="wedding-shop" class="wedding wedding-shop jewellery-shop">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.wedding_jewellery')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto wedding-jewelary-slider">
                    @foreach ($latest_products as $latest_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $latest_product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $latest_product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                        <div style="cursor: pointer" onclick="document.getElementById('wishlist').submit();" class="wish-icon">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                    <div class="discount">
                                        <span> -10% </span>
                                    </div>
                                </div>
                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                    <h6>{{ $latest_product->name }}</h6>
                                </a>
                                <h5>{{ $latest_product->price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($latest_product)
                        <div class="text-danger">Nothig to show Products....</div>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <!-- Trending item part Here -->
    <div id="wedding-shop" class="wedding wedding-shop trending-item">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.trending_items')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto trending-product-slider">
                    @foreach ($latest_products as $latest_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $latest_product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $latest_product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                        <div style="cursor: pointer" onclick="document.getElementById('wishlist').submit();" class="wish-icon">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                    <div class="discount">
                                        <span> -20% </span>
                                    </div>
                                </div>
                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                    <h6>{{ $latest_product->name }}</h6>
                                </a>
                                <h5>{{ $latest_product->price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($latest_product)
                        <div class="text-danger">Nothig to show Products....</div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
    <div class="shop-divider"></div>
@endsection

@section('footer_script')
    <script>
        $('.groom-special-slider').slick({
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

        $('.women-body-care-slider').slick({
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
        // Wedding Jewelary slider

        $('.wedding-jewelary-slider').slick({
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
        $('.trending-product-slider').slick({
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
    
@endsection