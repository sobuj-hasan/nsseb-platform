@extends('layouts.nsseb')

@section('body')
    <!-- Banner part start -->
    <header id="header" class="main-wrapper">
        <div class="index-banner">
            <div class="banner-overlay">
                <div class="container">
                    <div class="banner-div">
                        <div class="banner-text">
                            <h5 class="banner-top-text">Wellcome to the</h5>
                            <h1><strong class="bold-text">Nseeb Platform</strong></h1>
                            <h5 class="banner-bottom-text">to find your life pertner</h5>
                        </div>
                        <div class="banner-search">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-5 col-xs-6">
                                    <div class="mid-text">
                                        I am
                                    </div>
                                </div>
        
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="input-group">
                                        <select id="inputState" class="custom-input">
                                            <option class="select-text" selected> Men.. </option>
                                            <option class="select-text"> Women </option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="col-lg-4 col-md-4 col-sm-7 col-xs-6">
                                    <div class="mid-text-uniq">
                                        Looking for
                                    </div>
                                </div>
        
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="input-group">
                                        <select id="inputState" class="custom-input-uniq">
                                            <option class="select-text" selected> Women </option>
                                            <option class="select-text"> Men.. </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-btn">
                                <a class="join-btn" href="#">Join Now</a>
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

    <!-- Platform Analysis or There Love part -->
    <div id="achivement" class="achivement main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="achivement-wrapper">
                        <div class="achivement-part text-center">
                            <img class="hart-icon" src="{{ asset('nsseb_assets/media/icon/relief.svg') }}" alt="">
                            <h6 class="count"> 2.5 milion </h6>
                            <h4 class="title-text">have found there love</h4>
                            <p>100% secure</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="achivement-wrapper text-center">
                        <div class="achivement-part">
                            <img class="hart-icon" src="{{ asset('nsseb_assets/media/icon/couple.svg') }}" alt="">
                            <h6 class="count"> 90% People </h6>
                            <h4 class="title-text">make in a relationships</h4>
                            <p>You can make it easy</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="achivement-wrapper text-center">
                        <div class="achivement-part">
                            <img class="hart-icon" src="{{ asset('nsseb_assets/media/icon/chat-msg-icon.svg') }}" alt="">
                            <h6 class="count"> Lovely Live Chat </h6>
                            <h4 class="title-text">To lead Happy marraige life</h4>
                            <p>send text to find love</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Profile part start -->
    <div id="create-profile" class="create-profile main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="create-profile-left">
                        <h3>Create Your Profile today</h3>
                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="create-profile-right">
                        <div class="create-btn">
                            <a class="create-text" href="#">Create Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Section part start -->
    <div id="video-section" class="video-section main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="video-player">
                        <div class="play-icon res-playicon">
                            <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/ollH45NDXu0">
                            <img src="{{ asset('nsseb_assets/media/icon/video-player.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="video-text">
                        <h3>how to find your </h3>
                        <h5>life pertner</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                        by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of
                        Lorem Ipsum.If you are going to use a passage of Lorem Ipsum.</p>
                        <div class="watch-btn">
                            <a class="watch" href="#">Watch More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- App download part -->
    <div id="apps-download" class="apps-download main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="apps-down-text">
                        <h3>android & ios </h3>
                        <h5>Mobile app</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                        by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of
                        Lorem Ipsum.If you are going to use a passage of Lorem Ipsum.</p>
                        <div class="download-btn">
                            <a href="#"><img class="google" src="{{ asset('nsseb_assets/media/images/google-playstore.png') }}" alt=""></a>
                            <a href="#"><img class="apple" src="{{ asset('nsseb_assets/media/images/apple-playstore.png') }}" alt=""></a>
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

    <!-- Wedding shop part Here -->
    <div id="wedding" class="wedding main-wrapper">
        <div class="container">
            <div class="wedding-header">
                <h3>Your Wedding Shop</h3>
                <div class="text-area">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard
                        dummy text ever since</p>
                </div>
            </div>
            <div class="row m-auto">
                @foreach ($wedding_products as $product)
                    @include('nsseb_components/wedding_shop')
                    
                @endforeach
                @empty($product)
                    <h5 class="text-danger">Nothing to show Product...</h5>
                @endempty
            </div>
            <div class="clr-margin-bottom">
                <!-- this div use just margin bottom -->
            </div>
        </div>
    </div>
    
    <!-- Share love story  -->

    <div id="love-story" class="love-story main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="share-love-story">
                        <div class="women-img">
                            <img class="women" src="{{ asset('nsseb_assets/media/images/love-story-women.png') }}" alt="">
                        </div>
                        <div class="man-img">
                            <img class="man" src="{{ asset('nsseb_assets/media/images/love-story-man.png') }}" alt="">
                        </div>
                    </div>   
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="love-story-text text-center">
                        <h3>we share our love story</h3>
                        <h5>our couple life</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                        by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of
                        Lorem Ipsum.If you are going to use a passage of Lorem Ipsum.</p>
                        <div class="readmore-btn">
                            <a class="btn" href="#"> Read More </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reconmendation part  -->
    <div id="recommendation" class="recommendation main-wrapper">
        <div class="container">
            <div class="header">
                <h3>our recommendation</h3>
                <h5>read thair advice</h5>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="read-box">
                        <h4>Care Your pertner</h4>
                        <p class="mini-title">Care Your pertner</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                        by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div class="read-btn">
                            <a class="read" href="#">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="read-box">
                        <h4>Care Your pertner</h4>
                        <p class="mini-title">Care Your pertner</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
                            some form,
                            by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div class="read-btn">
                            <a class="read" href="#">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="read-box">
                        <h4>Care Your pertner</h4>
                        <p class="mini-title">Care Your pertner</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
                            some form,
                            by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div class="read-btn">
                            <a class="read" href="#">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="read-box">
                        <h4>Care Your pertner</h4>
                        <p class="mini-title">Care Your pertner</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
                            some form,
                            by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div class="read-btn">
                            <a class="read" href="#">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="read-box">
                        <h4>Care Your pertner</h4>
                        <p class="mini-title">Care Your pertner</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
                            some form,
                            by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div class="read-btn">
                            <a class="read" href="#">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="read-box">
                        <h4>Care Your pertner</h4>
                        <p class="mini-title">Care Your pertner</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
                            some form,
                            by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div class="read-btn">
                            <a class="read" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial part  -->
    @include('nsseb_components.testimonial')
@endsection