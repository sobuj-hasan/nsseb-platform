@php
    $local = app()->getLocale();
@endphp
@extends('layouts.nsseb')
@section('title', $single_profile->name)
@section('body')
    <style>
        #mobileOverlay {
            height: 0%;
        }
        header{
            height: 85px;
        }
    </style>
    <!-- View profile personal information -->
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
    <div id="profile" class="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="profile-details">
                        <img class="profile-photo" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $single_profile->profile_photo }}" alt="">
                        <div class="profile-details-text">
                            <h6>{{ \Carbon\Carbon::parse($single_profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</h6>
                            <h2>{{ Str::limit($single_profile->name, 21, $end='..') }}</h2>
                            <h5><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp; {{ $single_profile->present_city }} {{ $single_profile->country }}</h5>
                            <div class="work-part">
                                <i class="fas fa-briefcase work-at location"></i>
                                <h3>@lang('home.work_at')</h3>
                                <h4>{{ $single_profile->occupation }}</h4>
                            </div>
                            <div class="social-activity">
                                <i class="fas fa-globe glob"></i>
                                <h3>@lang('home.social_activity')</h3>

                                <div class="social-link">
                                    <i class="fab fa-facebook icon"></i>
                                    <a onclick="socialMedia()" class="link-text" href="#">
                                        @facebookprofile
                                    </a>
                                    <div class="clr"></div>

                                    <i class="fab fa-linkedin-in icon"></i>
                                    <a onclick="socialMedia()" class="link-text" href="#">
                                        linkedin-official
                                    </a>
                                    <div class="clr"></div>

                                    <i class="fab fa-instagram icon"></i>
                                    <a onclick="socialMedia()" class="link-text" href="#">
                                        @her.instagram
                                    </a>
                                    <div class="clr"></div>

                                    <i class="fab fa-twitter icon"></i>
                                    <a onclick="socialMedia()" class="link-text" href="#">
                                        #twitterprofile
                                    </a>
                                    <div class="clr"></div>

                                    <i class="fas fa-globe icon"></i>
                                    <a onclick="socialMedia()" class="link-text" href="#">
                                        hermediaplatform.com
                                    </a>
                                    <div class="clr"></div>
                                </div>
                                <h2>You are unable to check thire social profile</h2>
                                @if ($single_profile->user_id == Auth::id())
                                    <div class="upgrade-btn">
                                        <a class="upgrade" href="{{ route('dashboard') }}">Upgrade Your Profile</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="profile-view-details">
                        <div class="top-bar tab">
                            <div class="top-menu-bar">
                                <ul class="nav" id="nav-tab" role="tablist">
                                    <li role="presentation">
                                        <a class="active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                            aria-controls="nav-home" aria-selected="true">About {{ Str::limit($single_profile->full_name, 4, $end='..') }}</a>
                                        <img class="right-line responsive" src="{{ asset('nsseb_assets/media/icon/profile-page-line.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <a  id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Photos</a>
                                        <img class="right-line" src="{{ asset('nsseb_assets/media/icon/profile-page-line.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <a  id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Location</a>
                                        <img class="right-line responsive" src="{{ asset('nsseb_assets/media/icon/profile-page-line.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <a  id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">preference</a>
                                        <img class="right-line" src="{{ asset('nsseb_assets/media/icon/profile-page-line.svg') }}" alt="">
                                    </li>
                                    <li>
                                        <a onclick="message()" href="#"><img src="{{ asset('nsseb_assets/media/icon/massage-profile-page.svg') }}" alt=""></a>&nbsp;&nbsp;
                                        
                                        <a href="#"><img src="{{ asset('nsseb_assets/media/icon/hart-profile-page.svg') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="middle-content">
                                    <div class="about">
                                        <h4>@lang('home.about') {{ $single_profile->name }}</h4>
                                        <p>{{ $single_profile->your_about }}</p>
                                    </div>
                                </div>
                                <div class="personal-details">
                                    <h4>@lang('home.family_status')</h4>
                                    <div class="address-left-site">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>@lang('home.family_type')</h5>
                                                <label for="">{{ $single_profile->family_type ?? "N\A" }}</label>
                                                <h5>@lang('home.family_status')</h5>
                                                <label for="">{{ $single_profile->family_status ?? "N\A" }}</label>
                                                <h5>@lang('home.annual_income')</h5>
                                                <label for="">{{ $single_profile->annual_income ?? "N\A" }}</label>
                                                <h5>@lang('home.mother_tanguage')</h5>
                                                <label for="">{{ $single_profile->mother_tongue ?? "N\A" }}</label>
                                            </div>
                                
                                            <div class="col-lg-6">
                                                <p>{{ $single_profile->family_type ?? "N\A" }}</p>
                                                <p>{{ $single_profile->family_status ?? "N\A" }}</p>
                                                <p>{{ $single_profile->annual_income ?? "N\A" }}</p>
                                                <p>{{ $single_profile->mother_tongue ?? "N\A" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="personal-address">
                                        <h4>@lang('home.personal_information')</h4>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5>@lang('home.education') </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->education ?? "N\A" }}</label>
                                                <h5>@lang('home.age')</h5>
                                                <label for="">&nbsp;&nbsp; {{ \Carbon\Carbon::parse($single_profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</label>
                                                <h5>@lang('home.weight')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->weight ?? "N\A" }}</label>
                                                <h5>@lang('home.height')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->height ?? "N\A" }}</label>
                                                <h5>@lang('home.blood_group')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->blood ?? "N\A" }}</label>
                                                <h5>@lang('home.marital_status')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->merital_status ?? "N\A" }}</label>
                                                <h5>@lang('home.body_type')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->body_type ?? "N\A" }}</label>
                                                <h5>@lang('home.skin_tune')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->skin_tune ?? "N\A" }}</label>
                                                <h5>@lang('home.eye_color')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->eay_color ?? "N\A" }}</label>
                                                <h5>@lang('home.hair_color')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->hear_color ?? "N\A" }}</label>
                                                <h5>@lang('home.figure')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->body_type ?? "N\A" }}</label>
                                                <h5>@lang('home.any_disability')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->disability ?? "N\A" }}</label>
                                                <h5>@lang('home.hobby')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->hobby ?? "N\A" }}</label>
                                                <h5>@lang('home.habits')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->habits ?? "N\A" }}</label>
                                                <h5>@lang('home.present_city')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->present_city ?? "N\A" }}</label>
                                                <h5>@lang('home.present_country')</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->country ?? "N\A" }}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <p> {{ $single_profile->education ?? "N\A" }} </p>
                                                <p>{{ \Carbon\Carbon::parse($single_profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</p>
                                                <p> {{ $single_profile->weight ?? "N\A" }} </p>
                                                <p> {{ $single_profile->height ?? "N\A" }} </p>
                                                <p> {{ $single_profile->blood ?? "N\A" }} </p>
                                                <p> {{ $single_profile->merital_status ?? "N\A" }} </p>
                                                <p> {{ $single_profile->body_type ?? "N\A" }} </p>
                                                <p> {{ $single_profile->skin_tune ?? "N\A" }} </p>
                                                <p> {{ $single_profile->eay_color ?? "N\A" }} </p>
                                                <p> {{ $single_profile->hear_color ?? "N\A" }} </p>
                                                <p> {{ $single_profile->body_type ?? "N\A" }} </p>
                                                <p> {{ $single_profile->disability ?? "N\A" }} </p>
                                                <p> {{ $single_profile->hobby ?? "N\A" }} </p>
                                                <p> {{ $single_profile->habits ?? "N\A" }} </p>
                                                <p> {{ $single_profile->present_city ?? "N\A" }} </p>
                                                <p> {{ $single_profile->country ?? "N\A" }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="personal-details personal-preference">
                                    <div id="gallery" class="container-fluid">
                                        @foreach ($profile_photos as $photo)
                                            <img src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $photo->image }}" class="img-responsive">    
                                        @endforeach
                                        @empty($photo)
                                            <div class="text-danger">Nothing to show Image for this profile..</div>
                                        @endempty
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="personal-details personal-preference">
                                    <div class="personal-address">
                                        <h4>Present Address Details</h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>Country </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->present_country ?? "N\A" }} </label>
                                                <h5>State </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->peresent_state ?? "N\A" }} </label>
                                                <h5>City </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->present_city ?? "N\A" }} </label>
                                                <h5>Road No. Area Code </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->present_road ?? "N\A" }} </label>
                                                <h5>House No. Building</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->present_house ?? "N\A" }} </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <p> {{ $single_profile->present_country ?? "N\A" }} </p>
                                                <p> {{ $single_profile->peresent_state ?? "N\A" }} </p>
                                                <p> {{ $single_profile->present_city ?? "N\A" }} </p>
                                                <p> {{ $single_profile->present_road ?? "N\A" }} </p>
                                                <p> {{ $single_profile->present_house ?? "N\A" }} </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="personal-address">
                                        <h4>Parmanent Address Details</h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>Country </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->per_country ?? "N\A" }} </label>
                                                <h5>State </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->per_state ?? "N\A" }} </label>
                                                <h5>City </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->per_city ?? "N\A" }} </label>
                                                <h5>Road No. Area Code </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->per_road ?? "N\A" }} </label>
                                                <h5>House No. Building</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->per_house ?? "N\A" }} </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <p> {{ $single_profile->per_country ?? "N\A" }} </p>
                                                <p> {{ $single_profile->per_state ?? "N\A" }} </p>
                                                <p> {{ $single_profile->per_city ?? "N\A" }} </p>
                                                <p> {{ $single_profile->per_road ?? "N\A" }} </p>
                                                <p> {{ $single_profile->per_house ?? "N\A" }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <div class="personal-details personal-preference">
                                    <h4>Family Status</h4>
                                    <div class="address-left-site">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>Family Type :</h5>
                                                <label for="">{{ $single_profile->family_type ?? "N\A" }}</label>
                                                <h5>Family Staus :</h5>
                                                <label for="">{{ $single_profile->family_status ?? "N\A" }}</label>
                                                <h5>Annual Income :</h5>
                                                <label for="">{{ $single_profile->annual_income ?? "N\A" }}</label>
                                                <h5>Mother Tongue :</h5>
                                                <label for="">{{ $single_profile->mother_tongue ?? "N\A" }}</label>
                                            </div>
                                
                                            <div class="col-lg-6">
                                                <p>{{ $single_profile->family_type ?? "N\A" }}</p>
                                                <p>{{ $single_profile->family_status ?? "N\A" }}</p>
                                                <p>{{ $single_profile->annual_income ?? "N\A" }}</p>
                                                <p>{{ $single_profile->mother_tongue ?? "N\A" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="personal-address">
                                        <h4>Personal Information</h4>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5>Education </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->education ?? "N\A" }}</label>
                                                <h5>Age</h5>
                                                <label for="">&nbsp;&nbsp; {{ \Carbon\Carbon::parse($single_profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</label>
                                                <h5>Weight</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->weight ?? "N\A" }}</label>
                                                <h5>Height</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->height ?? "N\A" }}</label>
                                                <h5>Blood Group</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->blood ?? "N\A" }}</label>
                                                <h5>Marital Status</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->merital_status ?? "N\A" }}</label>
                                                <h5>Body Type</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->body_type ?? "N\A" }}</label>
                                                <h5>Skin Tone</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->skin_tune ?? "N\A" }}</label>
                                                <h5>Eye Color</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->eay_color ?? "N\A" }}</label>
                                                <h5>Hair Color</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->hear_color ?? "N\A" }}</label>
                                                <h5>Figure</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->body_type ?? "N\A" }}</label>
                                                <h5>Any Disability</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->disability ?? "N\A" }}</label>
                                                <h5>Hobby </h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->hobby ?? "N\A" }}</label>
                                                <h5>Habits</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->habits ?? "N\A" }}</label>
                                                <h5>Present City</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->present_city ?? "N\A" }}</label>
                                                <h5>Present Country</h5>
                                                <label for="">&nbsp;&nbsp; {{ $single_profile->country ?? "N\A" }}</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <p> {{ $single_profile->education ?? "N\A" }} </p>
                                                <p>{{ \Carbon\Carbon::parse($single_profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</p>
                                                <p> {{ $single_profile->weight ?? "N\A" }} </p>
                                                <p> {{ $single_profile->height ?? "N\A" }} </p>
                                                <p> {{ $single_profile->blood ?? "N\A" }} </p>
                                                <p> {{ $single_profile->merital_status ?? "N\A" }} </p>
                                                <p> {{ $single_profile->body_type ?? "N\A" }} </p>
                                                <p> {{ $single_profile->skin_tune ?? "N\A" }} </p>
                                                <p> {{ $single_profile->eay_color ?? "N\A" }} </p>
                                                <p> {{ $single_profile->hear_color ?? "N\A" }} </p>
                                                <p> {{ $single_profile->body_type ?? "N\A" }} </p>
                                                <p> {{ $single_profile->disability ?? "N\A" }} </p>
                                                <p> {{ $single_profile->hobby ?? "N\A" }} </p>
                                                <p> {{ $single_profile->habits ?? "N\A" }} </p>
                                                <p> {{ $single_profile->present_city ?? "N\A" }} </p>
                                                <p> {{ $single_profile->country ?? "N\A" }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Matched profile  -->
    <div id="other-profile" class="other-profile main-wrapper">
        <div class="container">
            <div class="matched-profile">
                <h3>@lang('home.most_matched')</h3>
                <div class="row">
                    @foreach ($matched_profile as $profile)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="profile">
                                <a href="{{ route('profile', $profile->id) }}"><img class="match-img" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $profile->profile_photo }}" alt=""></a>
                                <h6>{{ \Carbon\Carbon::parse($profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</h6>
                                <a href="{{ route('profile', $profile->id) }}"><h4>{{ Str::limit($profile->name, 20, $end='..') }} </h4></a>
                                <p> <i class="fas fa-map-marker-alt"></i> {{ $profile->present_city }} {{ $profile->country }}</p>
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
                                <h6>{{ \Carbon\Carbon::parse($profile->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months') }}</h6>
                                <a style="text-decoration: none;" href="{{ route('profile', $profile->id) }}">
                                    <h4>{{ Str::limit($profile->name, 20, $end='..') }}</h4>
                                </a>
                                <p> <i class="fas fa-map-marker-alt"></i> {{ $profile->present_city }} {{ $profile->country }}</p>
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

    <!-- Wedding Hall part Here -->
    <div id="wedding" class="wedding main-wrapper py-lg-5">
        <div class="container">
            <div class="wedding-header">
                <h3 class="text-left">Wedding halls</h3>
            </div>
            <div class="row pt-4 wedding-shop-slider2">
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
<script>
    function socialMedia(){
        alert('No direct communication with the authorities !')
    }

    function message(){
        alert('Cannot chat directly with profile owner !')
    }
</script>