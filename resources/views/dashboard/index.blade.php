@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('active_dashboard')
    active
@endsection
@section('dashboard_content')
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="information">
            <h6><strong>Marriage profile :</strong><span> Please use your real Information for profile create/update to find your best matched pertner.</span></h6>
            @php
                $auth_id = Auth::id();
                $profile_check = App\Models\UserForm::where('user_id', $auth_id)->count();
            @endphp
            @if ($profile_check == 1)
                <a class="btn btn-outline-info m-3" href="{{ route('profile.edit', Auth::id()) }}"><i class="far fa-edit"></i> Update Profile</a>
                @else
                <a class="btn btn-outline-danger m-3" href="{{ route('profile.index') }}"><i class="fas fa-plus"></i> Create Profile</a>
            @endif
            <hr>
            <div class="basic-information">
                <h4>Account Information</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="title">
                            <ul>
                                <li>
                                    <p>Name </p>
                                </li>
                                <li>
                                    <p>Email </p>
                                </li>
                                <li>
                                    <p>phone </p>
                                </li>
                                <li>
                                    <p>Joining </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="answer">
                            <ul>
                                <li>
                                    <p>{{ Auth::user()->name }}</p>
                                </li>
                                <li>
                                    <p>{{ Auth::user()->email }}</p>
                                </li>
                                <li>
                                    <p>{{ Auth::user()->phone }}</p>
                                </li>
                                <li>
                                    <p>{{ Auth::user()->created_at->format('d-M-Y') }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="personal-information">
                <h4>Your Statistics</h4>
                <hr>
                <div class="statistics p-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 text-center mb-5">
                            <div style="box-shadow: 2px 2px 12px #e2e2e2; padding: 10px;">
                                <h5 class="m-3 text-uppercase font-bold font-secondary text-overflow">Total Orders</h5>
                                <h3 class="font-600 m-3">{{ App\Models\Order::where('user_id', $auth_id)->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 text-center mb-5">
                            <div style="box-shadow: 2px 2px 12px #e2e2e2; padding: 10px;">
                                <h5 class="m-3 text-uppercase font-bold font-secondary text-overflow">Loved Your Profile</h5>
                                <h3 class="font-600 m-3">{{ App\Models\Order::where('user_id', $auth_id)->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 text-center mb-4">
                            <div style="box-shadow: 2px 2px 12px #e2e2e2; padding: 10px;">
                                <h5 class="m-3 text-uppercase font-bold font-secondary text-overflow">Wishes Products</h5>
                                <h3 class="font-600 m-3">{{ App\Models\Wishlist::where('user_id', $auth_id)->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 text-center mb-4">
                            <div style="box-shadow: 2px 2px 12px #e2e2e2; padding: 10px;">
                                <h5 class="m-3 text-uppercase font-bold font-secondary text-overflow">Save Products</h5>
                                <h3 class="font-600 m-3">{{ App\Models\SaveLater::where('user_id', $auth_id)->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection








































