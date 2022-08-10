@extends('layouts.nsseb')
@section('title', 'Matchmaker Registration')
@section('body')
    <!-- Register PART START -->
    <div class="login-part sign-up-page vendor-signup my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-9 col-sm-12">
                    <div class="login">
                        <div class="login-section">
                            <h4 class="text-center">@lang('home.welcome_to_our_matchmaker')</h4>
                            <p class="text-center mb-5">@lang('home.signup')</p>
                            
                            <form method="POST" action="{{ route('matchmaker.store') }}">
                                @csrf
                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.name')" value="{{ old('name') }}" name="name">
                                </div>

                                <div class="mt-4 login">
                                    <input type="phone" class="form-control" placeholder="@lang('home.Mobile_number')" value="{{ old('phone') }}" name="phone">
                                </div>

                                <div class="mt-4 login">
                                    <input type="email" class="form-control" placeholder="@lang('home.email')" value="{{ old('email') }}" name="email">
                                </div>
                                
                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.address')" value="{{ old('living_place') }}" name="living_place">
                                </div>
                                
                                <div class="mt-4 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Number_years_practicing_profession')" value="{{ old('matchmaker_experience') }}" name="matchmaker_experience">
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












