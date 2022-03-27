@extends('layouts.nsseb')
@section('title', 'Our Services')
@section('body')
    <!-- Service part start  -->
    <section class="service-banner py-5 bg-white">
        <div class="overlay">
            <div class="container my-3">
                <div class="content text-center">
                    <h2>@lang('home.booking_request')</h2>
                    <img class="img-fluid" src="{{ asset('nsseb_assets/media/images/before-line.png') }}" alt="img">
                </div>
            </div>
        </div>
    </section>
    
    <!-- BOOKING REQUEST -->
    <section id="booking-request" class="booking-request parking-valet py-5" style="background: #efefef;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-3 text-center">Send Your Booking Request</h5>
                    <form method="POST" action="{{ route('booking.request') }}">
                        @csrf
                        <div class="contact-form py-5">
                            <div class="row">
                                <div class="col-md-4 my-3">
                                    <input type="text" class="custom-control" placeholder="Full Name" value="{{ old('name') }}" name="name" required>
                                </div>                                         
                                <div class="col-md-4 my-3">
                                    <input type="text" class="custom-control" placeholder="Phone No." value="{{ old('phone') }}" name="phone" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <input type="text" class="custom-control" placeholder="Email Address" value="{{ old('email') }}" name="email" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <input type="text" class="custom-control" placeholder="Country" value="{{ old('country') }}" name="country" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <input type="text" class="custom-control" placeholder="City" value="{{ old('city') }}" name="city" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <input type="text" class="custom-control" placeholder="Address" value="{{ old('address') }}" name="address" required>
                                </div>
                                <div class="col-md-6 my-3">
                                    <input type="date" class="custom-control" placeholder="Service Date" value="{{ old('service_date') }}" name="service_date" required>
                                </div>
                                <div class="col-md-6 my-3">
                                    <select class="form-select" name="service" required>
                                        <option value="" selected>Select Your Service</option>
                                        <option value="Cooking academy">Cooking academy</option>
                                        <option value="Family Counseling and Family Counseling">Family Counseling and Family Counseling</option>
                                        <option value="Family Counseling and Family Counseling">Family Counseling and Family Counseling</option>
                                        <option value="Family Counseling and Family Counseling">Family Counseling and Family Counseling</option>
                                    </select>
                                </div>
                                <div class="col-md-12 my-3">
                                    <textarea style="height: 230px;" class="custom-control" name="message" cols="30" placeholder="Service Description" rows="10">{{ old('message') }}</textarea required>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <button type="submit">Submit Service Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- BOOKING REQUEST -->
@endsection


