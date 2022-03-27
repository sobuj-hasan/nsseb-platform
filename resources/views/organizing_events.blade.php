@extends('layouts.nsseb')
@section('title', 'Organizing events & covering parties')
@section('body')
    <!-- Header part start -->
    <section class="service-banner py-5 bg-white">
        <div class="overlay">
            <div class="container my-3">
                <div class="content text-center">
                    <h2>@lang('home.organizing_events')</h2>
                    <img class="img-fluid" src="{{ asset('nsseb_assets/media/images/before-line.png') }}" alt="img">
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container py-lg-3">
            <div class="service-text-banner d-flex justify-content-center" style="background-image: url({{ asset('nsseb_assets/media/images/organization-events-text-banner.png'); }})">
                <div class="text-box">
                    <img class="img-fluid mt-3" src="{{ asset('nsseb_assets/media/images/service-text-title-img.png') }}" alt="img">
                    <p class="mt-5 mb-5">@lang('home.events_banner_text')</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container py-lg-3">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="service-box text-center">
                        <div class="number">
                            01
                        </div>
                        <p class="pt-5">@lang('home.events_text1')</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="service-box text-center">
                        <div class="number">
                            02
                        </div>
                        <p class="pt-5">@lang('home.events_text2')</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="service-box text-center">
                        <div class="number">
                            03
                        </div>
                        <p class="pt-5">@lang('home.events_text3')</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="service-box text-center">
                        <div class="number">
                            04
                        </div>
                        <p class="pt-5">@lang('home.events_text4')</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="service-box text-center">
                        <div class="number">
                            05
                        </div>
                        <p class="pt-5">@lang('home.events_text5')</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="service-box text-center">
                        <div class="number">
                            06
                        </div>
                        <p class="pt-5">@lang('home.events_text6')</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-5">
                    <div class="service-box text-center">
                        <div class="number">
                            07
                        </div>
                        <p class="pt-5">@lang('home.events_text7')</p>
                    </div>
                </div>
            </div>
            <div class="view-button text-center mt-lg-5 mb-lg-4">
                <a class="your-service mr-2" href="">@lang('home.for_your_service')</a>
                <a class="more-information ml-2" href="">@lang('home.more_information')</a>
            </div>
        </div>
    </section>

    <!-- Weekend discount Part -->
    @include('nsseb_components.weekend_discount')
    <!-- Weekend discount Part End -->
@endsection


