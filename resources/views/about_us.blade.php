@extends('layouts.nsseb')
@section('title', 'About Us')
@section('body')
    <!-- Service part start  -->
    <section class="service-banner py-5 bg-white">
        <div class="overlay">
            <div class="container my-3">
                <div class="content text-center">
                    <h2>@lang('home.aboutus')</h2>
                    <img class="img-fluid" src="{{ asset('nsseb_assets/media/images/before-line.png') }}" alt="img">
                </div>
            </div>
        </div>
    </section>
    <div id="register" class="main-wrapper my-5">
        <div class="register-part">
            <section class="">
                <div class="container">
                    <div class="row py-5 mt-3">
                        <div class="col-md-6 align-self-center">
                            <img width="90%" src="{{ asset('nsseb_assets/media/images/login-page-img.png') }}" alt="management">
                        </div>
                        <div class="col-md-6 align-self-center mt-3 mt-md-0">
                            <h2 class="mb-2" style="font-weight: 600;">@lang('home.who_we_are')</h2>
                            <p class="mb-2">@lang('home.aboutus_text1')</p>
                            <p class="mb-2">@lang('home.aboutus_text2')</p>
                            <p class="mb-2">@lang('home.aboutus_text3')</p>
                            <p class="mb-2">@lang('home.aboutus_text4')</p>
                            <p class="mb-2">@lang('home.aboutus_text5')</p>
                            <p class="mb-2">@lang('home.aboutus_text6')</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection


