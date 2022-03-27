@extends('layouts.dashboard')
@section('title', 'Account Information')
@section('active_account')
    active
@endsection

@section('dashboard_content')
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="information">
            <h6><strong>Account Information :</strong><span> Please use your real Information for profile update to find your best matched pertner.</span></h6>
            @php
                $auth_id = Auth::id();
                $profile_check = App\Models\UserForm::where('user_id', $auth_id)->count();
            @endphp
            @if ($profile_check == 1)
                <a class="btn btn-outline-info ml-3" href="{{ route('profile.edit', Auth::id()) }}"><i class="far fa-edit"></i> Update Profile</a>
                @else
                <a class="btn btn-outline-danger ml-3" href="{{ route('profile.index') }}"><i class="fas fa-plus"></i> Create Profile</a>
            @endif
            <hr>
            <div class="basic-information">
                <h4>Basic Information</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="title">
                            <ul>
                                <li>
                                    <p>Full Name</p>
                                </li>
                                <li>
                                    <p>phone Number </p>
                                </li>
                                <li>
                                    <p>Email </p>
                                </li>
                                <li>
                                    <p>Date of Birth </p>
                                </li>
                                <li>
                                    <p>Age </p>
                                </li>
                                <li>
                                    <p>Religion </p>
                                </li>
                                <li>
                                    <p>Mother Tongue </p>
                                </li>
                                <li>
                                    <p>Country </p>
                                </li>
                                <li>
                                    <p>Merital Status </p>
                                </li>
                                <li>
                                    <p>Blood </p>
                                </li>
                                <li>
                                    <p>Annual Income </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="answer">
                            <ul>
                                <li>
                                    <p>{{ $account_info->full_name ?? "N\A" }}</p>
                                </li>
                                <li>
                                    <p>{{ $account_info->phone ?? "N\A" }}</p>
                                </li>
                                <li>
                                    <p>{{ $account_info->email ?? "N\A" }}</p>
                                </li>
                                <li>
                                    <p>{{ $account_info->birth_date ?? "N\A" }}</p>
                                </li>
                                <li>
                                    <p>{{ $account_info->age ?? "N\A" }}</p>
                                </li>
                                <li>
                                    <p>{{ $account_info->religion ?? "N\A" }}</p>
                                </li>
                                <li>
                                    <p>{{ $account_info->mother_tongue ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->country ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->merital_status ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->blood ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->annual_income ?? "N\A" }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="personal-information">
                <h4>Personal Information</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="title">
                            <ul>
                                <li>
                                    <p>Education </p>
                                </li>
                                <li>
                                    <p>Height </p>
                                </li>
                                <li>
                                    <p>Weight </p>
                                </li>
                                <li>
                                    <p>Skin Tune </p>
                                </li>
                                <li>
                                    <p>Eay Color </p>
                                </li>
                                <li>
                                    <p>Hear Color </p>
                                </li>
                                <li>
                                    <p>Body Type </p>
                                </li>
                                <li>
                                    <p>Family Type </p>
                                </li>
                                <li>
                                    <p>Family Status </p>
                                </li>
                                <li>
                                    <p>Occupation </p>
                                </li>
                                <li>
                                    <p>Hobby </p>
                                </li>
                                <li>
                                    <p>Habits </p>
                                </li>
                                <li>
                                    <p>Permanent address </p>
                                </li>
                                <li>
                                    <p>Permanent City </p>
                                </li>
                                <li>
                                    <p>Permanent Country </p>
                                </li>
                                <li>
                                    <p>Present Address </p>
                                </li>
                                <li>
                                    <p>Present City </p>
                                </li>
                                <li>
                                    <p>Present Country </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="answer">
                            <ul>
                                <li>
                                    <p>{{ $account_info->education ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->height ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->weight ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->skin_tune ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->eay_color ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->hear_color ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->body_type ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->family_type ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->family_status ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->occupation ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->hobby ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->habits ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->per_house ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->per_city ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->per_country ?? "N\A" }}</p>
                                </li>
                                <li>
                                    <p>{{ $account_info->present_house ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->present_city ?? "N\A" }} </p>
                                </li>
                                <li>
                                    <p>{{ $account_info->present_country ?? "N\A" }} </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection








































