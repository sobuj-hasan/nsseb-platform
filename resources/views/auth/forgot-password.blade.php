@extends('layouts.nsseb')

@section('body')
    <header id="header" class="main-wrapper">
        <div class="banner-img">
            <div class="banner-overlay">
                <div class="container">
                    <div class="header-div">
                        <div class="banner-title">
                            <h1>Find your best match <strong class="bold-text">Sign in</strong> here </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-bottom">
            </div>
        </div>
    </header>

    <div id="register" class="register main-wrapper">
        <div class="register-part m-5">
            <div class="container">
                <div class="card m-auto">
                    <div class="form-header text-center">
                        <h2>Forget Password</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-input">
                                <h4 class="form-title">Email </h4>
                                <div class="input-field">
                                    <img class="icon" src="{{ asset('nsseb_assets/media/icon/user-icon.svg') }}" alt="">
                                    <input class="custom-input" type="text" name="email" placeholder="Type Email" value="{{ old('email') }}" required autofocus>
                                    <span> <img class="input-line" src="{{ asset('nsseb_assets/media/icon/line-icon.svg') }}" alt=""></span>
                                    <br>
                                    @error('email')
                                        <span class="autherror">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="submit-part">
                                <div class="submit-login-button">
                                    <button class="a-text" type="submit" name="submit"> Send Reset Link </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

