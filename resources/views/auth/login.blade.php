@extends('layouts.nsseb')
@section('title', 'Log in')
@section('body')
    <!-- Service banner part start  -->
    <section class="service-banner py-5">
        <div class="overlay">
            <div class="container py-lg-3">
                <div class="content text-left">
                    <div class="header-div">
                        <div class="banner-title">
                            <h1>@lang('home.find_your_best_match_partner')<strong class="bold-text">@lang('home.sign_in')</strong> @lang('home.here') </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="register" class="register main-wrapper" style="background-color: #efefef;">
        <div class="register-part">
            <div class="container">
                <div class="card">
                    <div class="form-header text-center">
                        <h2>@lang('home.login')</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-input">
                                <h4 class="form-title">@lang('home.email_address') </h4>
                                <div class="input-field">
                                    <img class="icon" src="{{ asset('nsseb_assets/media/icon/user-icon.svg') }}" alt="">
                                    <input class="custom-input" type="text" name="email" placeholder="@lang('home.type_email')" value="{{ old('email') }}" required autofocus>
                                    <span> <img class="input-line" src="{{ asset('nsseb_assets/media/icon/line-icon.svg') }}" alt=""></span>
                                    <br>
                                    @error('email')
                                        <span class="autherror">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-input">
                                <h4 class="form-title">@lang('home.password') </h4>
                                <div class="input-field">
                                    <img class="icon" src="{{ asset('nsseb_assets/media/icon/password-icon.svg') }}" alt="">
                                    <input class="custom-input" type="password" name="password" placeholder="@lang('home.type_your_password')" required autocomplete="current-password">
                                    <span> <img class="input-line" src="{{ asset('nsseb_assets/media/icon/line-icon.svg') }}" alt=""></span>
                                    <br>
                                    @error('password')
                                        <span class="autherror">{{ $message }}</span>
                                    @enderror
                                    <a class="forget-pass" href="{{ route('password.request') }}">@lang('home.forget_your_password')</a>
                                </div>
                            </div>

                            <div class="submit-part">
                                <div class="submit-login-button">
                                    <button class="a-text" type="submit">@lang('home.login')</button>
                                </div>
                            </div>
                        </form>
                        <div class="signin-msg text-center">
                            <p class="signin">@lang('home.login_or_signup_using')</p> <span>
                            <div class="login p-1 mt-2">
                                <span>
                                    <a href="#"><img class="loginwith" src="{{ asset('nsseb_assets/media/icon/login-with-fb.svg') }}" alt=""></a>
                                </span>
                                <span>
                                    <a href="#"><img class="loginwith" src="{{ asset('nsseb_assets/media/icon/login-with-inst.svg') }}" alt=""></a>
                                </span>
                                <span>
                                    <a href="#"><img class="loginwith" src="{{ asset('nsseb_assets/media/icon/login-with-google.svg') }}" alt=""></a>
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="log-img">
                        <!-- login page image here -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


