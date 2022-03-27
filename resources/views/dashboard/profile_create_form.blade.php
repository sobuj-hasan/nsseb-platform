@extends('layouts.nsseb')
@section('title', 'Create Marriage Profile')
@push('styles')

<style>
    /* Hide all steps by default: */
    .tab {
        display: none;
    }

</style>

@endpush

@section('body')
    <section class="service-banner py-5">
        <div class="overlay">
            <div class="container py-lg-3">
                <div class="content text-left">
                    <div class="header-div mb-5">
                        <div class="banner-title">
                            <h5 class="banner-top-text">Please use your</h5>
                            <h1><strong class="bold-text">real information</strong> for registration</h1>
                            <h5 class="banner-bottom-text">to find your best matched pertner</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- form one part Here -->
    <div id="from-one" class="from-one main-wrapper">
        <div class="from-one-step">
            <div class="container">
                <div class="progress-step">
                    <div class="first-step">
                        <span>
                            <img class="carcel-img" src="{{ asset('nsseb_assets/media/icon/carcel-icon.svg') }}" alt="">
                            <h3 class="step-title">First Steps</h3>
                            <img class="step-arrow" src="{{ asset('nsseb_assets/media/images/step-arrow.png') }}" alt="">
                        </span>
                    </div>

                    <div class="second-step">
                        <span>
                            <img class="carcel2-img" src="{{ asset('nsseb_assets/media/icon/carcel-icon.svg') }}" alt="">
                            <h3 class="step2-title">Second Steps</h3>
                            <img class="step2-arrow" src="{{ asset('nsseb_assets/media/images/step-arrow.png') }}" alt="">
                        </span>
                    </div>

                    <div class="three-step">
                        <span>
                            <img class="carcel3-img" src="{{ asset('nsseb_assets/media/icon/carcel-icon.svg') }}" alt="">
                            <h3 class="step3-title">Final Steps</h3>
                        </span>
                    </div>
                </div>
                <div class="clr"></div>

                <form id="information_form" method="POST" action="{{ route('profile.store') }}">
                    @csrf
                    <div class="tab">
                        <div class="basic-info-form">
                            <h1 class="basic-info">Basic Information</h1>
                            <div class="full-form">
                                <div class="custom-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                <div class="name-text">
                                                    Name
                                                </div>
                                                <div class="name-text">
                                                    Email
                                                </div>
                                                <div class="name-text">
                                                    Gender
                                                </div>
                                                <div class="name-text">
                                                    Phone
                                                </div>

                                                <div class="name-text">
                                                    Date of Birth
                                                </div>

                                                <div class="name-text">
                                                    Age
                                                </div>

                                                <div class="name-text">
                                                    Religion
                                                </div>

                                                <div class="name-text">
                                                    Mother Tongue
                                                </div>

                                                <div class="name-text">
                                                    Country
                                                </div>

                                                <div class="name-text">
                                                    Marital Status
                                                </div>

                                                <div class="name-text">
                                                    Blood Group
                                                </div>

                                                <div class="name-text">
                                                    Annual Income
                                                </div>

                                                <div class="name-text">
                                                    About You
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                                <div class="name-input">
                                                    <label for="">Name</label>
                                                    <input class="custom-input" type="hidden" placeholder="get id" value="{{ Auth::id() }}" name="user_id">
                                                    <input class="custom-input" type="text" placeholder="name here" value="{{ old('full_name') }}" name="full_name" required>
                                                </div>
                                                @error('full_name')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Email</label>
                                                    <input class="custom-input" type="email" placeholder="email here" value="{{ old('email') }}" name="email" required>
                                                </div>
                                                @error('email')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Gender </label>
                                                    <select id="inputState" class="custom-input" name="gender" required>
                                                        <option class="option-text mute" value="" selected> Select </option>
                                                        <option class="option-text" value="male"> Male </option>
                                                        <option class="option-text" value="female"> Female </option>
                                                    </select>
                                                </div>
                                                @error('gender')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Phone</label>
                                                    <input class="custom-input" type="phone" value="{{ old('phone') }}" placeholder="+966 " name="phone" required>
                                                </div>
                                                @error('phone')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Date of Birth</label>
                                                    <input class="custom-input" type="text" placeholder="DD/MM/Year" value="{{ old('birth_date') }}" name="birth_date" required>
                                                </div>
                                                @error('birth_date')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Age</label>
                                                    <select id="inputState" class="custom-input" name="age">
                                                        <option class="option-text" value="{{ old('age') }}" selected> Select one </option>
                                                        <option class="option-text" value="18+"> 18+ </option>
                                                        <option class="option-text" value="19+"> 19+ </option>
                                                        <option class="option-text" value="20+"> 20+ </option>
                                                        <option class="option-text" value="21+"> 21+ </option>
                                                        <option class="option-text" value="22+"> 22+ </option>
                                                        <option class="option-text" value="23+"> 23+ </option>
                                                        <option class="option-text" value="24+"> 24+ </option>
                                                        <option class="option-text" value="25+"> 25+ </option>
                                                        <option class="option-text" value="26+"> 26+ </option>
                                                        <option class="option-text" value="27+"> 27+ </option>
                                                        <option class="option-text" value="28+"> 28+ </option>
                                                        <option class="option-text" value="29+"> 29+ </option>
                                                        <option class="option-text" value="30+"> 30+ </option>
                                                        <option class="option-text" value="31+"> 31+ </option>
                                                        <option class="option-text" value="32+"> 32+ </option>
                                                        <option class="option-text" value="33+"> 33+ </option>
                                                        <option class="option-text" value="34+"> 34+ </option>
                                                        <option class="option-text" value="35+"> 35+ </option>
                                                        <option class="option-text" value="36+"> 36+ </option>
                                                        <option class="option-text" value="37+"> 37+ </option>
                                                        <option class="option-text" value="38+"> 38+ </option>
                                                        <option class="option-text" value="39+"> 39+ </option>
                                                        <option class="option-text" value="40+"> 40+ </option>
                                                        <option class="option-text" value="41+"> 41+ </option>
                                                        <option class="option-text" value="42+"> 42+ </option>
                                                        <option class="option-text" value="43+"> 43+ </option>
                                                        <option class="option-text" value="44+"> 44+ </option>
                                                        <option class="option-text" value="45+"> 45+ </option>
                                                        <option class="option-text" value="46+"> 46+ </option>
                                                        <option class="option-text" value="47+"> 47+ </option>
                                                        <option class="option-text" value="48+"> 48+ </option>
                                                        <option class="option-text" value="49+"> 49+ </option>
                                                        <option class="option-text" value="50+"> 50+ </option>
                                                        <option class="option-text" value="51+"> 51+ </option>
                                                        <option class="option-text" value="52+"> 52+ </option>
                                                        <option class="option-text" value="53+"> 53+ </option>
                                                        <option class="option-text" value="54+"> 54+ </option>
                                                        <option class="option-text" value="55+"> 55+ </option>
                                                        <option class="option-text" value="56+"> 56+ </option>
                                                        <option class="option-text" value="57+"> 57+ </option>
                                                        <option class="option-text" value="58+"> 58+ </option>
                                                        <option class="option-text" value="59+"> 59+ </option>
                                                        <option class="option-text" value="60+"> 60+ </option>
                                                    </select>
                                                </div>
                                                @error('age')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Religion</label>
                                                    <input class="custom-input" type="text" value="{{ old('religion')  }}" placeholder="religion" name="religion" required>
                                                </div>
                                                @error('religion')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Mother Tongue</label>
                                                    <input class="custom-input" type="text" value="{{ old('mother_tongue') }}" placeholder="mother tongue" name="mother_tongue" required>
                                                </div>
                                                @error('mother_tongue')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Country </label>
                                                    <input class="custom-input" type="text" value="{{ old('country') }}" placeholder="country name" name="country" required>
                                                </div>
                                                @error('country')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Merital Status </label>
                                                    <select id="inputState" class="custom-input" name="merital_status" required>
                                                        <option class="option-text mute" value="" selected> Select </option>
                                                        <option class="option-text" value="Single"> Single </option>
                                                        <option class="option-text" value="Double"> Double </option>
                                                        <option class="option-text" value="Divorced"> Divorced </option>
                                                    </select>
                                                </div>
                                                @error('merital_status')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Blood Group</label>
                                                    <select id="inputState" class="custom-input" name="blood" required>
                                                        <option class="option-text mute" value="" selected> Select </option>
                                                        <option class="option-text" value="A+"> A+ </option>
                                                        <option class="option-text" value="AB+"> AB+ </option>
                                                        <option class="option-text" value="A-"> A- </option>
                                                        <option class="option-text" value="O+"> O+ </option>
                                                        <option class="option-text" value="O-"> O- </option>
                                                        <option class="option-text" value="B+"> B+ </option>
                                                        <option class="option-text" value="B-"> B- </option>
                                                    </select>
                                                </div>
                                                @error('blood')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Annual Income </label>
                                                    <input class="custom-input" type="text" value="{{ old('') }}"placeholder="ex.20000+ SAR" name="annual_income" required>
                                                </div>
                                                @error('annual_income')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">About You </label>
                                                    <textarea style="height: 180px;" class="custom-input" placeholder="write something about you.." name="your_about" required>{{ old('your_about') }}</textarea>
                                                </div>
                                                @error('your_about')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <!-- continue btn class use for form height -->
                                                <div class="continue-btn">
                                                    {{-- <a class="continue-text" href="#"> Save Now </a> --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="personal-info-form">
                            <!-- personal info form  -->
                            <h1 class="step-2">Personal Information</h1>
                            <div class="full-form">
                                <div class="custom-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                <div class="name-text">
                                                    Education
                                                </div>
                                                <div class="name-text">
                                                    Height
                                                </div>

                                                <div class="name-text">
                                                    Weight
                                                </div>

                                                <div class="name-text">
                                                    Skin Tune
                                                </div>

                                                <div class="name-text">
                                                    Eay Color
                                                </div>

                                                <div class="name-text">
                                                    Hear Color
                                                </div>

                                                <div class="name-text">
                                                    Body Type
                                                </div>

                                                <div class="name-text">
                                                    Family Type
                                                </div>

                                                <div class="name-text">
                                                    Family Status
                                                </div>

                                                <div class="name-text">
                                                    Occupation
                                                </div>

                                                <div class="name-text">
                                                    Any Disability
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                                <div class="name-input">
                                                    <label for="">Education</label>
                                                    <select id="inputState" class="custom-input" name="education" required>
                                                        <option class="option-text mute" value="{{ old('') }}" selected> Select </option>
                                                        <option class="option-text"> M S C </option>
                                                        <option class="option-text"> B S C </option>
                                                        <option class="option-text"> Diploma graduated </option>
                                                        <option class="option-text"> H S C </option>
                                                        <option class="option-text"> S S C </option>
                                                        <option class="option-text"> Primary Education </option>
                                                        <option class="option-text"> N/A </option>
                                                    </select>
                                                </div>
                                                @error('education')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Height</label>
                                                    <select id="inputState" class="custom-input" name="height" required>
                                                        <option class="option-text mute" value="{{ old('height') }}" selected> Select </option>
                                                        <option class="option-text" value=" 4 ft 2 inch "> 4 ft 2 inch </option>
                                                        <option class="option-text" value=" 4 ft 3 inch "> 4 ft 3 inch </option>
                                                        <option class="option-text" value=" 4 ft 4 inch "> 4 ft 4 inch </option>
                                                        <option class="option-text" value=" 4 ft 5 inch "> 4 ft 5 inch </option>
                                                        <option class="option-text" value=" 4 ft 6 inch "> 4 ft 6 inch </option>
                                                        <option class="option-text" value=" 4 ft 7 inch "> 4 ft 7 inch </option>
                                                        <option class="option-text" value=" 4 ft 8 inch "> 4 ft 8 inch </option>
                                                        <option class="option-text" value=" 4. ft 10 inch "> 4. ft 10 inch </option>
                                                        <option class="option-text" value=" 4. ft 11 inch "> 4. ft 11 inch </option>
                                                        <option class="option-text" value=" 4. ft 12 inch "> 4. ft 12 inch </option>
                                                        <option class="option-text" value=" 5 ft 0 inch "> 5 ft 0 inch </option>
                                                        <option class="option-text" value=" 5 ft 1 inch "> 5 ft 1 inch </option>
                                                        <option class="option-text" value=" 5 ft 2 inch "> 5 ft 2 inch </option>
                                                        <option class="option-text" value=" 5 ft 3 inch "> 5 ft 3 inch </option>
                                                        <option class="option-text" value=" 5 ft 4 inch "> 5 ft 4 inch </option>
                                                        <option class="option-text" value=" 5 ft 5 inch "> 5 ft 5 inch </option>
                                                        <option class="option-text" value=" 5 ft 6 inch "> 5 ft 6 inch </option>
                                                        <option class="option-text" value=" 5 ft 7 inch "> 5 ft 7 inch </option>
                                                        <option class="option-text" value=" 5 ft 8 inch "> 5 ft 8 inch </option>
                                                        <option class="option-text" value=" 5 ft 9 inch "> 5 ft 9 inch </option>
                                                        <option class="option-text" value=" 6 ft 10 inch "> 6 ft 10 inch </option>
                                                        <option class="option-text" value=" 6 ft 11 inch "> 6 ft 11 inch </option>
                                                        <option class="option-text" value=" 6 ft 12 inch "> 6 ft 12 inch </option>
                                                        <option class="option-text" value=" 7 ft 0 inch "> 7 ft 0 inch </option>
                                                        <option class="option-text" value=" 7 ft 1 inch "> 7 ft 1 inch </option>
                                                        <option class="option-text" value=" 7 ft 2 inch "> 7 ft 2 inch </option>
                                                        <option class="option-text" value=" 7 ft 3 inch "> 7 ft 3 inch </option>
                                                        <option class="option-text" value=" 7 ft 4 inch "> 7 ft 4 inch </option>
                                                        <option class="option-text" value=" 7 ft 5 inch "> 7 ft 5 inch </option>
                                                        <option class="option-text" value=" 7 ft 6 inch "> 7 ft 6 inch </option>
                                                        <option class="option-text" value=" 7 ft 7 inch "> 7 ft 7 inch </option>
                                                        <option class="option-text" value=" 7 ft 8 inch "> 7 ft 8 inch </option>
                                                        <option class="option-text" value=" 7 ft 9 inch "> 7 ft 9 inch </option>
                                                        <option class="option-text" value=" 7 ft 10 inch "> 7 ft 10 inch </option>
                                                        <option class="option-text" value=" 7 ft 11 inch "> 7 ft 11 inch </option>
                                                        <option class="option-text" value=" 7 ft 12 inch "> 7 ft 12 inch </option>
                                                        <option class="option-text" value=" 8 ft 0 inch "> 8 ft 0 inch </option>
                                                    </select>
                                                </div>
                                                @error('height')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Weight</label>
                                                    <input class="custom-input" type="text" placeholder="ex. 70 kg" value="{{ old('weight') }}" name="weight" required>
                                                </div>
                                                @error('weight')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Skin Tune</label>
                                                    <input class="custom-input" type="text" placeholder="ex. PANTONE 53-7C" value="{{ old('skin_tune') }}" name="skin_tune" required>
                                                </div>
                                                @error('skin_tune')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Eay Color</label>
                                                    <select id="inputState" class="custom-input" name="eay_color" required>
                                                        <option class="option-text" value="{{ old('eay_color') }}" selected> Select </option>
                                                        <option class="option-text" value="Blue"> Blue </option>
                                                        <option class="option-text" value="Rare"> Rare </option>
                                                        <option class="option-text" value="Green"> Green </option>
                                                        <option class="option-text" value="Hazel"> Hazel </option>
                                                        <option class="option-text" value="Brown"> Brown </option>
                                                    </select>
                                                </div>
                                                @error('eay_color')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Hear Color</label>
                                                    <select id="inputState" class="custom-input" name="hear_color" required>
                                                        <option class="option-text" value="{{ old('hear_color') }}" selected> Select </option>
                                                        <option class="option-text" value="Brown"> Brown </option>
                                                        <option class="option-text" value="Heighlights"> Heighlights </option>
                                                        <option class="option-text" value="Ashbrown"> Ashbrown </option>
                                                        <option class="option-text" value="Lintbrown"> Lintbrown </option>
                                                        <option class="option-text" value="Black"> Black </option>
                                                        <option class="option-text" value="White"> White </option>
                                                    </select>
                                                </div>
                                                @error('hear_color')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Body Type</label>
                                                    <select id="inputState" class="custom-input" name="body_type" required>
                                                        <option class="option-text" value="{{ old('body_type') }}" selected> Select </option>
                                                        <option class="option-text" value="Slim"> Slim </option>
                                                        <option class="option-text" value="Tone"> Tone </option>
                                                        <option class="option-text" value="Muscular"> Muscular </option>
                                                        <option class="option-text" value="Stocky"> Stocky </option>
                                                        <option class="option-text" value="Large"> Large </option>
                                                    </select>
                                                </div>
                                                @error('body_type')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Family Type</label>
                                                    <select id="inputState" class="custom-input" name="family_type" required>
                                                        <option class="option-text" value="{{ old('family_type') }}" selected> Select </option>
                                                        <option class="option-text" value="Small"> Small </option>
                                                        <option class="option-text" value="Large"> Large </option>
                                                        <option class="option-text" value="Join Family"> Join Family </option>
                                                    </select>
                                                </div>
                                                @error('family_type')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Family Status</label>
                                                    <input class="custom-input" type="text" value="{{ old('family_status') }}" placeholder="rich, poor or something" name="family_status" required>
                                                </div>
                                                @error('family_status')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Occupation</label>
                                                    <input class="custom-input" type="text" value="{{ old('occupation') }}" placeholder="occupation" name="occupation">
                                                </div>
                                                @error('occupation')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Any Disability</label>
                                                    <input class="custom-input" type="text" value="{{ old('disability') }}" placeholder="disability" name="disability">
                                                </div>
                                                @error('disability')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <!-- continue btn class use for form height -->
                                                <div class="continue-btn">
                                                    {{-- <a class="continue-text" href="#"> Save Now </a> --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="personal-address-form">
                            <!--personal address form -->
                            <h1 class="step-2">Your Address</h1>
                            <div class="final-step-form">
                                <div class="custom-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                <div class="name-text">
                                                    Your Hobby
                                                </div>
                                                <div class="name-text">
                                                    Your Habits
                                                </div>

                                                <div class="name-text">
                                                    Present Address
                                                </div>

                                                <div class="permanent-address">
                                                    Permanent Address
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                                <div class="name-input">
                                                    <label for="">Your Hobby</label>
                                                    <input class="custom-input" type="text" value="{{ old('hobby') }}" placeholder="your hobby" name="hobby">
                                                </div>
                                                @error('hobby')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Your Habits</label>
                                                    <input class="custom-input" type="text" value="{{ old('habits') }}" placeholder="your habits" name="habits">
                                                </div>
                                                @error('habits')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <label for="">Present Address</label>
                                                    <input class="custom-input" type="text" value="{{ old('per_country') }}" placeholder="country" name="per_country" required>
                                                </div>
                                                @error('per_country')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <input class="custom-input" type="text" value="{{ old('per_state') }}" placeholder="state" name="per_state" required>
                                                </div>
                                                @error('per_state')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <input class="custom-input" type="text" value="{{ old('per_city') }}" placeholder="city" name="per_city" required>
                                                </div>
                                                @error('per_city')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <input class="custom-input" type="text" value="{{ old('per_road') }}" placeholder="road/area code" name="per_road" required>
                                                </div>
                                                @error('per_road')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <textarea style="height: 120px;" class="custom-input" placeholder="House No, Building" name="per_house" required>{{ old('per_house') }}</textarea>
                                                </div>
                                                @error('per_house')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <div class="name-input per-address">
                                                        <label for="">Permanent Address</label>
                                                        <input class="custom-input" type="text" value="{{ old('present_country') }}" placeholder="country" name="present_country" required>
                                                    </div>
                                                </div>
                                                @error('present_country')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <input class="custom-input" value="{{ old('present_state') }}" type="text" placeholder="state" name="peresent_state" required>
                                                </div>
                                                @error('present_state')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <input class="custom-input" type="text" value="{{ old('present_city') }}" placeholder="city" name="present_city" required>
                                                </div>
                                                @error('present_city')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <input class="custom-input" type="text" value="{{ old('present_road') }}" placeholder="Road/area code" name="present_road" required>
                                                </div>
                                                @error('present_road')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="name-input">
                                                    <textarea style="height: 120px;" class="custom-input" placeholder="House No, Building" name="present_house" required>{{ old('present_house') }}</textarea>
                                                </div>
                                                @error('present_house')
                                                    <small style="margin-left: 30px;" class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <!-- continue btn class use for form height -->
                                                <div class="continue-btn">
                                                    {{-- <a class="continue-text" href="#"> Save Now </a> --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 m-auto">
                        <div class="form-item my-5 d-flex custom">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="button mx-2 w-100 custom-btn" style="display: none;">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)" class="button mx-2 w-100 custom-btn">Next</button>
                        </div>
                        {{-- <button class="btn btn-info" type="submit"> Save Now</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')

<script>
    var currentTab = 0;
    showTab(currentTab);

    function showTab(n) {
        var tabs = $(".tab");
        $(tabs[n]).show();

        if (n == 0) {
            $("#prevBtn").hide();
        } else {
            $("#prevBtn").css('display', 'inline');
        }
        if (n == (tabs.length - 1)) {
            $("#nextBtn").html('Submit');
        } else {
            $("#nextBtn").html(@lang('homepage.Next'));
        }
    }

    function nextPrev(n) {
        var tabs = $(".tab");
        currentTab = currentTab + n;
        if (currentTab >= tabs.length) {
            return $("#information_form").submit();
        }

        $(tabs[currentTab - n]).hide();
        showTab(currentTab);
    }
</script>

@endsection
























