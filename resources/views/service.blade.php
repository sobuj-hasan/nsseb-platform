@extends('layouts.nsseb')
@section('title', 'Our Services')
@section('body')
    <!-- Service part start  -->
    <section class="service-banner py-5 bg-white">
        <div class="overlay">
            <div class="container my-3">
                <div class="content text-center">
                    <h2>@lang('home.services')</h2>
                    <img class="img-fluid" src="{{ asset('nsseb_assets/media/images/before-line.png') }}" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!-- PLANING EVENTS START -->
    <section class="planing-events bg-white py-5">
        <div class="container">
            <div class="row pt-2">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 pb-5">
                    <img class="w-100" src="{{ asset('nsseb_assets/media/images/Cooking-academy.png') }}" alt="event-img">
                    <h5 class="py-4 pe-5">@lang('home.Cooking_academy') </h5>
                    <p class="paragraph pe-5">@lang('home.Cooking_academy_text1')</p>
                    <p class="paragraph pe-5">@lang('home.Cooking_academy_text2')</p><br><br><br><br>
                    <div class="readmore mt-5">
                        <a class="readmore-btn" href="{{ route('service.booking') }}">@lang('home.booking_request')</a>
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 pb-5">
                    <img class="w-100" src="{{ asset('nsseb_assets/media/images/Family-Counseling-and-Family-Counseling.png') }}" alt="event-img">
                    <h5 class="py-4 pe-5">@lang('home.family_counseling')</h5>
                    <p class="paragraph pe-5">@lang('home.family_counseling_text1')</p>
                    <p class="paragraph pe-5">@lang('home.family_counseling_text2')</p>
                    <p class="paragraph pe-5">@lang('home.family_counseling_text3')</p>
                    <div class="readmore mt-lg-5 mt-md-4 mt-sm-2">
                        <a class="readmore-btn" href="{{ route('service.booking') }}">@lang('home.booking_request')</a>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 pb-5 mt-5">
                    <img class="w-100" src="{{ asset('nsseb_assets/media/images/One-stop-shop-for-marriage-needs.png') }}" alt="event-img">
                    <h5 class="py-4 pe-5">@lang('home.one_stop_shop_title')</h5>
                    {{-- <p class="paragraph pe-5">@lang('home.family_counseling_text1')</p>
                    <p class="paragraph pe-5">@lang('home.family_counseling_text2')</p>
                    <p class="paragraph pe-5">@lang('home.family_counseling_text3')</p> --}}
                    <div class="readmore mt-5">
                        <a class="readmore-btn" href="{{ route('shop') }}">@lang('home.shopnow')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PLANING EVENTS END -->

    <!-- Weekend discount Part -->
    @include('nsseb_components.weekend_discount')
    <!-- Weekend discount Part End -->
@endsection


