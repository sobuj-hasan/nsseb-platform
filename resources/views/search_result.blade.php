@php
    $local = app()->getLocale();
@endphp
@extends('layouts.nsseb')
@section('title', 'Marriage Profile')
@section('body')
    <header id="header" class="main-wrapper">
        <div class="index-banner py-5">
            <div class="banner-overlay py-3">
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
                            <a class="" href="#">
                                <i class="far fa-heart"></i> &nbsp; @lang('home.wishlist')
                                <span class="number-count"><p> {{ App\Models\Wishlist::where('user_id', Auth::id() ?? '')->count() }} </p></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="banner-div banner-div-search">
                        <div class="banner-text">
                            <h1><strong class="bold-text">@lang('home.we_help_to')</strong></h1>
                            {{-- <h5 class="banner-top-text">@lang('home.nsseb_platform')</h5> --}}
                            <h5 class="banner-bottom-text">@lang('home.find_life_partner')</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part End -->
    <style>
        .landing-search .custom-form{
            height: 45px;
            outline: none;
            font-weight: 600;
        }
        .landing-search .search-btn button {
            font-weight: 600;
            font-size: 24px;
            color: #74408f;
            background: #ffffff;
            padding: 6px 30px;
            border: 1px solid #333333;
            outline: none;
            border-radius: 5px;
        }
    </style>
    <!-- landing searchbar  -->
    <div id="landing-search" class="landing-search">
        <div class="container">
            <div class="banner-search">
                <form method="GET" action="{{ route('profile.search.result') }}">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h4 class="pt-5 pb-2 text-white">@lang('home.sex')</h4>
                            <div class="name-input">
                                <select id="inputState" class="form-control custom-form" name="sex" required>
                                    <option class="option-text" value="" selected> @lang('home.select') </option>
                                    <option class="option-text" value="Male"> @lang('home.male') </option>
                                    <option class="option-text" value="Female"> @lang('home.female') </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h4 class="pt-5 pb-2 text-white">@lang('home.nationality')</h4>
                            <div class="name-input">
                                <input type="text" class="form-control custom-form" placeholder="@lang('home.nationality')" name="nationality" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h4 class="pt-5 pb-2 text-white">@lang('home.education_label')</h4>
                            <div class="name-input">
                                <input type="text" class="form-control custom-form" placeholder="@lang('home.education_label')" name="education" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h4 class="pt-5 pb-2 text-white">@lang('home.tribe')</h4>
                            <div class="name-input">
                                <select id="inputState" class="form-control custom-form" name="tribe">
                                    <option class="option-text" value="" selected> @lang('home.select') </option>
                                    <option class="option-text" value="Islam"> Islam </option>
                                    <option class="option-text" value="Christianity"> Christianity </option>
                                    <option class="option-text" value="Secular[a]/Nonreligious[b]/Agnostic/Atheist"> Secular[a]/Nonreligious[b]/Agnostic/Atheist </option>
                                    <option class="option-text" value="Buddhism"> Buddhism </option>
                                    <option class="option-text" value="Chinese traditional religion"> Chinese traditional religion </option>
                                    <option class="option-text" value="Ethnic"> Ethnic religions </option>
                                    <option class="option-text" value="African traditional religions"> African traditional religions </option>
                                    <option class="option-text" value="Sikhism"> Sikhism </option>
                                    <option class="option-text" value="Spiritism"> Spiritism </option>
                                    <option class="option-text" value="Judaism"> Judaism </option>
                                    <option class="option-text" value="Baháʼí"> Baháʼí </option>
                                    <option class="option-text" value="Jainism"> Jainism </option>
                                    <option class="option-text" value="Shinto"> Shinto </option>
                                    <option class="option-text" value="Cao"> Cao Dai </option>
                                    <option class="option-text" value="Zoroastrianism"> Zoroastrianism </option>
                                    <option class="option-text" value="Tenrikyo"> Tenrikyo </option>
                                    <option class="option-text" value="Animism"> Animism </option>
                                    <option class="option-text" value="Neo"> Neo-Paganism </option>
                                    <option class="option-text" value="Unitarian"> Unitarian Universalism </option>
                                    <option class="option-text" value="Rastafari"> Rastafari </option>
                                    <option class="option-text" value="Others"> Others </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h4 class="pt-4 pb-2 text-white">@lang('home.place_living')</h4>
                            <div class="name-input">
                                <input type="text" class="form-control custom-form" placeholder="@lang('home.place_living')" name="living_place" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <h4 class="pt-4 pb-2 text-white">@lang('home.social_status')</h4>
                            <div class="name-input">
                                <input type="text" class="form-control custom-form" placeholder="@lang('home.social_status')" name="social_status" required>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <h4 class="mt-4 mb-2 text-white">@lang('home.age_range')</h4>
                            <div class="name-input mb-5">
                                <select id="inputState" class="form-control custom-form" name="minimum_age" required>
                                    <option class="option-text" value="" selected> @lang('home.min_age') </option>
                                    <option class="option-text" value="18+"> 18+ </option>
                                    <option class="option-text" value="19+"> 19+ </option>
                                    <option class="option-text" value="20+"> 20+ </option>
                                    <option class="option-text" value="21+"> 21+ </option>
                                    <option class="option-text" value="22+"> 22+ </option>
                                    <option class="option-text" value="23+"> 23+ </option>
                                    <option class="option-text" value="24+"> 24+ </option>
                                    <option class="option-text" value="25+"> 25+ </option>
                                    <option class="option-text" value="26+"> 26+ </option>
                                    <option class="option-text" value="27+"> 27+ </option>
                                    <option class="option-text" value="28+"> 28+ </option>
                                    <option class="option-text" value="29+"> 29+ </option>
                                    <option class="option-text" value="30+"> 30+ </option>
                                    <option class="option-text" value="31+"> 31+ </option>
                                    <option class="option-text" value="32+"> 32+ </option>
                                    <option class="option-text" value="33+"> 33+ </option>
                                    <option class="option-text" value="34+"> 34+ </option>
                                    <option class="option-text" value="35+"> 35+ </option>
                                    <option class="option-text" value="36+"> 36+ </option>
                                    <option class="option-text" value="37+"> 37+ </option>
                                    <option class="option-text" value="38+"> 38+ </option>
                                    <option class="option-text" value="39+"> 39+ </option>
                                    <option class="option-text" value="40+"> 40+ </option>
                                    <option class="option-text" value="41+"> 41+ </option>
                                    <option class="option-text" value="42+"> 42+ </option>
                                    <option class="option-text" value="43+"> 43+ </option>
                                    <option class="option-text" value="44+"> 44+ </option>
                                    <option class="option-text" value="45+"> 45+ </option>
                                    <option class="option-text" value="46+"> 46+ </option>
                                    <option class="option-text" value="47+"> 47+ </option>
                                    <option class="option-text" value="48+"> 48+ </option>
                                    <option class="option-text" value="49+"> 49+ </option>
                                    <option class="option-text" value="50+"> 50+ </option>
                                    <option class="option-text" value="51+"> 51+ </option>
                                    <option class="option-text" value="52+"> 52+ </option>
                                    <option class="option-text" value="53+"> 53+ </option>
                                    <option class="option-text" value="54+"> 54+ </option>
                                    <option class="option-text" value="55+"> 55+ </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <h4 class="mt-4 mb-2 text-white">@lang('home.age_range')</h4>
                            <div class="name-input mb-5">
                                <select id="inputState" class="form-control custom-form" name="maximum_age" required>
                                    <option class="option-text" value="" selected> @lang('home.max_age') </option>
                                    <option class="option-text" value="55+"> 55+ </option>
                                    <option class="option-text" value="54+"> 54+ </option>
                                    <option class="option-text" value="53+"> 53+ </option>
                                    <option class="option-text" value="52+"> 52+ </option>
                                    <option class="option-text" value="51+"> 51+ </option>
                                    <option class="option-text" value="50+"> 50+ </option>
                                    <option class="option-text" value="49+"> 49+ </option>
                                    <option class="option-text" value="48+"> 48+ </option>
                                    <option class="option-text" value="47+"> 47+ </option>
                                    <option class="option-text" value="46+"> 46+ </option>
                                    <option class="option-text" value="45+"> 45+ </option>
                                    <option class="option-text" value="44+"> 44+ </option>
                                    <option class="option-text" value="43+"> 43+ </option>
                                    <option class="option-text" value="42+"> 42+ </option>
                                    <option class="option-text" value="41+"> 41+ </option>
                                    <option class="option-text" value="40+"> 40+ </option>
                                    <option class="option-text" value="39+"> 39+ </option>
                                    <option class="option-text" value="38+"> 38+ </option>
                                    <option class="option-text" value="37+"> 37+ </option>
                                    <option class="option-text" value="36+"> 36+ </option>
                                    <option class="option-text" value="35+"> 35+ </option>
                                    <option class="option-text" value="34+"> 34+ </option>
                                    <option class="option-text" value="33+"> 33+ </option>
                                    <option class="option-text" value="32+"> 32+ </option>
                                    <option class="option-text" value="31+"> 31+ </option>
                                    <option class="option-text" value="30+"> 30+ </option>
                                    <option class="option-text" value="29+"> 29+ </option>
                                    <option class="option-text" value="28+"> 28+ </option>
                                    <option class="option-text" value="27+"> 27+ </option>
                                    <option class="option-text" value="26+"> 26+ </option>
                                    <option class="option-text" value="25+"> 25+ </option>
                                    <option class="option-text" value="24+"> 24+ </option>
                                    <option class="option-text" value="23+"> 23+ </option>
                                    <option class="option-text" value="22+"> 22+ </option>
                                    <option class="option-text" value="21+"> 21+ </option>
                                    <option class="option-text" value="20+"> 20+ </option>
                                    <option class="option-text" value="19+"> 19+ </option>
                                    <option class="option-text" value="18+"> 18+ </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 mt-2">
                            <div class="search-btn mt-5">
                                <button type="submit"> @lang('home.search') </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Result Show profile part   -->
    <div id="other-profile" class="other-profile main-wrapper">
        <div class="container">
            <div class="matched-profile result-profile">
                <div class="row">
                    @foreach ($marriage_profile as $profile)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="profile">
                                <a href="{{ route('profile', $profile->id) }}"><img class="match-img" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $profile->profile_photo }}" alt=""></a>
                                <h6>{{ $profile->age ?? "N/A" }} Years</h6>
                                {{-- <h6>{{ \Carbon\Carbon::parse($profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</h6> --}}
                                <a href="{{ route('profile', $profile->id) }}"><h4>{{ Str::limit($profile->name, 20, $end='..') }} </h4></a>
                                <p> <i class="fas fa-map-marker-alt"></i> {{ $profile->living_place }}</p>
                            </div>
                        </div>
                    @endforeach
                    @empty($profile)
                        <div class="text-danger">Nothing to show profile...</div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
    
    <!-- Top Profile -->
    <div id="top-profile" class="top-profile main-wrapper">
        <div class="container">
            <div class="profile">
                <h3>@lang('home.top_profile')</h3>
                <div class="top-profile-part">
                    <div class="row m-auto">
                        @foreach ($top_profile as $profile)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ route('profile', $profile->id) }}">
                                    <img class="top-img" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $profile->profile_photo }}" alt="">
                                </a>
                                <h6>{{ $profile->age ?? "N/A" }} Years</h6>
                                {{-- <h6>{{ \Carbon\Carbon::parse($profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</h6> --}}
                                <a style="text-decoration: none;" href="{{ route('profile', $profile->id) }}">
                                    <h4>{{ Str::limit($profile->name, 20, $end='..') }}</h4>
                                </a>
                                <p> <i class="fas fa-map-marker-alt"></i> {{ $profile->living_place }} </p>
                            </div>
                        @endforeach
                        @empty($profile)
                            <div class="text-danger">Nothing to show top profile...</div>
                        @endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider-div"></div>

    <!-- Subscribe / get email part -->
    @include('nsseb_components.subscriber')

    <!-- New Profile -->
    <div id="new-member" class="new-member top-profile">
        <div class="container">
            <div class="profile new-profile">
                <h3>@lang('home.new_member')</h3>

                <div class="top-profile-part new-profile-part">
                    <div class="row m-auto">
                        @foreach ($new_profile as $profile)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ route('profile', $profile->id) }}"><img class="top-img" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $profile->profile_photo }}" alt=""></a>
                                <h6>{{ $profile->age ?? "N/A" }} Years</h6>
                                {{-- <h6>{{ \Carbon\Carbon::parse($profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</h6> --}}
                                <a href="{{ route('profile', $profile->id) }}"><h4>{{ Str::limit($profile->name, 20, $end='..') }}</h4></a>
                                <p> <i class="fas fa-map-marker-alt"></i> {{ $profile->living_place }} </p>
                            </div>
                        @endforeach
                        @empty($profile)
                            <div class="text-danger">Nothing to show New Profile...</div>
                        @endempty
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Wedding shop part Here -->
    <div id="wedding" class="wedding main-wrapper">
        <div class="container">
            <div class="wedding-header">
                <h3>@lang('home.your_wedding_shop')</h3>
            </div>
            <div class="row m-auto pt-5 wedding-shop-slider2">
                @foreach ($wedding_products as $product)
                    @include('nsseb_components/wedding_shop')
                @endforeach
                @empty($product)
                    <div class="text-danger">
                        Nothing to show Product...
                    </div>
                @endempty
            </div>
            <div class="clr-margin-bottom">
                <!-- this div use just margin bottom -->
            </div>
        </div>
    </div>

    <!-- Our Blog part -->
    {{-- <div id="blog" class="blog search-page-blog">
        <div class="container">
            <h3>Our Blog</h3>
            <div class="blog-text">
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat
                    duis enim velit
                    mollit. Exercitation veniam consequat sunt nostrud amet.</p>
            </div>
            <!-- blogs part here -->
            @include('nsseb_components.blogpart')

        </div>
    </div> --}}

    <!-- Testimonial part  -->
    {{-- @include('nsseb_components.testimonial') --}}

@endsection

@section('footer_script')
    <script>
        $('.wedding-shop-slider2').slick({
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
