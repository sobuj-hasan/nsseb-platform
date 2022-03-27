@extends('layouts.nsseb')
@section('title', 'Registration')
@section('body')
    <!-- Service banner part start  -->
    <section class="service-banner py-5 bg-white">
        <div class="overlay py-lg-3">
            <div class="container my-lg-3">
                <div class="content text-left">
                    <div class="header-div">
                        <div class="banner-title">
                            <h1>@lang('home.find_your_best_match_partner')<strong class="bold-text">@lang('home.sign_in')</strong> @lang('home.here')</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Register PART START -->
    <div class="login-part sign-up-page vendor-signup my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-10 col-sm-12">
                    <div class="login">
                        <div class="login-section user-register">
                            <h4 class="text-center mb-5 pb-2">@lang('home.user_registration')</h4>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <h6 class="form-title">@lang('home.name') </h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.name')" value="{{ old('name') }}" name="name" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.email_address') </h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.email_address')" value="{{ old('email') }}" name="email" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.phone') </h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.phone')" value="{{ old('phone') }}" name="phone" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.sex')</h6>
                                <div class="mt-1 login">
                                    <select class="form-control" aria-label="Default select example" name="gender" required>
                                        <option value="" selected>@lang('home.select_one')</option>
                                        <option value="Male">@lang('home.male')</option>
                                        <option value="Female">@lang('home.female')</option>
                                    </select>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.age')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.age')" value="{{ old('age') }}" name="age" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.nationality')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.nationality')" value="{{ old('nationality') }}" name="nationality" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.educational_qualification')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.educational_qualification')" value="{{ old('education') }}" name="education" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.height')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.height')" value="{{ old('height') }}" name="height" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.weight')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.weight')" value="{{ old('weight') }}" name="weight" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.social_status')</h6>
                                <div class="mt-1 login">
                                    <select class="form-control" aria-label="Default select example" name="social_status" required>
                                        <option value="" selected>@lang('home.select_one')</option>
                                        <option value="Single">@lang('home.single')</option>
                                        <option value="Divorced">@lang('home.Divorced')</option>
                                        <option value="Married">@lang('home.Married')</option>
                                        <option value="Widower">@lang('home.Widower')</option>
                                    </select>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.no_of_children')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.no_of_children')" value="{{ old('children') }}" name="children" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.Tribe')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Tribe')" value="{{ old('tribe') }}" name="tribe" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.Occupation')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Occupation')" value="{{ old('occupation') }}" name="occupation" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.Workplace')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Workplace')" value="{{ old('workplace') }}" name="workplace" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.Salary')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.Salary')" value="{{ old('salary') }}" name="salary" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.place_of_living')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.place_of_living')" value="{{ old('living_place') }}" name="living_place" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.attributes_and_traits')</h6>
                                <div class="mt-1 login">
                                    <input type="text" class="form-control" placeholder="@lang('home.attributes_and_traits')" value="{{ old('attributes_trait') }}" name="attributes_trait" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.password')</h6>
                                <div class="mt-1 login">
                                    <input type="password" class="form-control" placeholder="@lang('home.type_your_address')" value="{{ old('password') }}" name="password" required>
                                </div>

                                <h6 class="form-title mt-3">@lang('home.confirm_password')</h6>
                                <div class="mt-1 login">
                                    <input type="password" class="form-control" placeholder="@lang('home.re_type_password')" value="{{ old('password_confirmation') }}" name="password_confirmation">
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












