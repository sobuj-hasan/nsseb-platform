@extends('layouts.nsseb')
@section('title', 'Contact Us')
@section('body')
    <!-- Service part start  -->
    <section class="service-banner py-5 bg-white">
        <div class="overlay">
            <div class="container my-3">
                <div class="content text-center">
                    <h2>@lang('home.contact_us')</h2>
                    <img class="img-fluid" src="{{ asset('nsseb_assets/media/images/before-line.png') }}" alt="img">
                </div>
            </div>
        </div>
    </section>
    <div id="register" class="register main-wrapper">
        <div class="container">
            <div class="register-part">
                <div class="inner-content contact-now pt-5 pb-5">
                    <div class="container">
                    <!--Contact Start-->
                    <div class="row">
                            <div class="col-md-4">
                            <div class="contact"> <span><i class="fa fa-home"></i></span>
                            <div class="information"> <strong>@lang('home.address')</strong>
                                <p>@lang('home.address_value')</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact"> <span><i class="fa fa-phone"></i></span>
                            <div class="information"> <strong>@lang('home.phone_no')</strong>
                                <p>@lang('home.land_number')</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact"> <span><i class="fa fa-envelope"></i></span>
                            <div class="information"> <strong>@lang('home.email_address')</strong>
                                <p>nseebhr@help.com</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row msg-generet">
                        <div style="margin-left: 10px;" class="col-md-5">
                                </div>
                        </div>
                        <div class="row formCont">
                            <div class="col-md-6">
                                <form action="{{ route('contact.msg') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-wrap">
                                            <input type="text" placeholder="@lang('home.full_name')" class="form-control" name="name" required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <div class="form-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                        </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="input-wrap">
                                            <input type="text" placeholder="@lang('home.your_phone')" class="form-control" name="phone" required>
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <div class="form-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="input-wrap">
                                        <input type="text" placeholder="@lang('home.your_email')" class="form-control" name="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="form-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <div class="input-wrap"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                        <textarea class="form-control" placeholder="@lang('home.type_your_message')" name="message" required spellcheck="false"></textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="form-icon"><i class="fa fa-comment" aria-hidden="true"></i></div>
                                    </div>
                                    <div class="contact-btn">
                                        <button class="sub" type="submit" value="submit" name="submit"> <i class="fa fa-paper-plane" aria-hidden="true"></i>@lang('home.send_message')</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="mapWrp">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4310.803364979789!2d46.69397069499528!3d24.694620262786554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03e34eeffc47%3A0xfe09bb19801c399e!2sRiadah%20Incubators!5e0!3m2!1sen!2sbd!4v1634926112415!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                        <!--Contact End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


