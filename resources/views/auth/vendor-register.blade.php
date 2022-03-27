@extends('layouts.nsseb')
@section('title', 'Registration')
@section('body')

    <!-- Register PART START -->
    <div class="login-part sign-up-page vendor-signup my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-9 col-sm-12">
                    <div class="login">
                        <div class="login-section">
                            <h4 class="text-center">@lang('home.welcome_our_business_partner')</h4>
                            <p class="text-center mb-5">@lang('home.signup')</p>
                            
                            <form method="POST" action="{{ route('vendor.store') }}">
                                @csrf
                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Merchant_name')" value="{{ old('name') }}" name="name">
                                </div>

                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Store_name')" value="{{ old('store_name') }}" name="store_name">
                                </div>

                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Mobile_number')" value="{{ old('phone') }}" name="phone">
                                </div>

                                <div class="mt-4 login">
                                    <input type="phone" class="form-control" placeholder="@lang('home.email_address')" value="{{ old('email') }}" name="email">
                                </div>
                                
                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.address')" value="{{ old('store_address') }}" name="store_address">
                                </div>
                                
                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Activity_type')" value="{{ old('activity_type') }}" name="activity_type">
                                </div>

                                <div class="mt-4 login">
                                    <input type="password" class="form-control" placeholder="@lang('home.password')" value="{{ old('password') }}" name="password">
                                </div>

                                <div class="mt-4 login">
                                    <input type="password" class="form-control" placeholder="@lang('home.confirm_password')" value="{{ old('password_confirmation') }}" name="password_confirmation">
                                </div>

                                <div class="mb-4 mt-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">@lang('home.show_password')</label>
                                </div>
                                <button class="w-100 mb-2" type="submit" class="btn btn-primary">@lang('home.submit')</button>
                                <span class="form-text">@lang('home.have_any_account') <a class="text-bolder" href="{{ route('login') }}">@lang('home.sign_in')</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register PART END -->
@endsection












