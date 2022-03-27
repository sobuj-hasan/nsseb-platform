@extends('layouts.nsseb')


@section('body')
    <div class="dashboard">
        <div class="container">
            <div class="user-dashboard">
                <div class="row">
                    @php
                        $auth = Auth::user();
                    @endphp
                    <!-- Dashboard left bar Here ! -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="left-side">
                            <div class="profile">
                                <img src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $auth->profile_photo }}" alt="">
                                <h3>{{ $auth->name }}</h3>
                                <p>{{ $auth->phone }}</p>
                                <div class="btn">
                                    <a class="btn btn-outline-info" href="{{ route('user.user.profile.edit') }}"><i class="far fa-edit"></i> profile edit </a>
                                </div>
                            </div>
                            <div class="left-menu">
                                <ul>
                                    <li class="@yield('active_dashboard')">
                                        <a href="{{ route('dashboard') }}"><i class="fas fa-id-card"></i>&nbsp; Dashboard </a>
                                    </li>
                                    @if (App\Models\UserForm::where('user_id', Auth::id())->count() == 1)
                                        <li class="@yield('active_account')">
                                            <a href="{{ route('account.info') }}"><i class="fas fa-user-alt"></i>&nbsp; Account Information</a>
                                        </li>
                                        <li class="@yield('active_photos')">
                                            <a href="{{ route('account.photos') }}"><i class="fas fa-user-alt"></i>&nbsp; Profile Photos</a>
                                        </li>
                                    @endif
                                    <li class="@yield('active_order')">
                                        <a href="{{ route('myorder.create') }}"><i class="fas fa-user-alt"></i>&nbsp; My Orders</a>
                                    </li>
                                    <li class="@yield('active_wishlist')">
                                        <a href="{{ route('my.wishlist') }}"><i class="fas fa-user-alt"></i>&nbsp; My Wishlist</a>
                                    </li>
                                    <li class="@yield('active_setting')">
                                        <a href="{{ route('user.user.setting') }}"><i class="fas fa-user-alt"></i>&nbsp; Profile Settings</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @yield('dashboard_content')

                </div>
            </div>
        </div>
    </div>

@endsection
