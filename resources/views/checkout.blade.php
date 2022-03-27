@extends('layouts.nsseb')
@section('title', 'Checkout')
@section('body')
    <div class="checkout-wrapper">
        <div class="container">
            <div class="checkout">  
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shipping-add">
                            <h2>Shipping Address</h2>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="color: #74408f;" class="alert alert-info">
                                            Loged in as ({{ Auth::user()->name }})
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Name</label>
                                            <input type="hidden" name="billing_id" value="@if($countb) {{ $billing->id }} @endif">
                                            <input type="text" class="form-control" value="@if($countb) {{ $billing->name }} @endif" id="field-1" placeholder="name" name="name">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Surname</label>
                                            <input type="text" class="form-control" id="field-2" value="@if($countb) {{ $billing->surname }} @endif" placeholder="surname" name="surname">
                                            @error('surname')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Email address</label>
                                            <input type="text" class="form-control" value="@if($countb) {{ $billing->email }} @endif" id="field-1" placeholder="email" name="email">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Phone</label>
                                            <input type="text" class="form-control" value="@if($countb) {{ $billing->phone }} @endif" id="field-2" placeholder="phone" name="phone">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="field-5" class="control-label">Country</label>
                                            <input type="text" class="form-control" value="@if($countb) {{ $billing->country }} @endif" id="field-5" placeholder="country" name="country">
                                            @error('country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="field-4" class="control-label">City</label>
                                            <input type="text" class="form-control" value="@if($countb) {{ $billing->city }} @endif" id="field-4" placeholder="city" name="city">
                                            @error('city')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="field-6" class="control-label">Zip Code</label>
                                            <input type="text" value="@if($countb) {{ $billing->zip_code }} @endif" class="form-control" id="field-6" placeholder="123456" name="zip_code">
                                            @error('zip_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-3" class="control-label">Address</label>
                                            <input type="text" value="@if($countb) {{ $billing->address }} @endif" class="form-control" id="field-3" placeholder="Address Here" value="" name="address">
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group no-margin">
                                            <label for="field-7" class="control-label">Personal Opinion</label>
                                            <textarea class="form-control" id="field-7" name="opinion" placeholder="Write something about your order">@if($countb) {{ $billing->opinion }} @endif</textarea>
                                            @error('opinion')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="checkout-part">
                            <h2>Payment Info</h2>
                            <h3>Payment method</h3>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="delivery-method">
                                        <div class="radio">
                                            <input type="radio" name="payment_method" id="radio1" value="1" checked>
                                            <label for="radio1">
                                                Cash on Delivery
                                            </label>
                                        </div>
                                        <div class="radio radio-custom">
                                            <input type="radio" name="payment_method" id="radio2" value="2" disabled>
                                            <label for="radio2">
                                                Credit Card
                                            </label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input type="radio" name="payment_method" id="radio3" value="3" disabled>
                                            <label for="radio3">
                                                Paypal
                                            </label>
                                        </div>
                                        <div class="radio radio-success">
                                            <input type="radio" name="payment_method" id="radio4" value="4" disabled>
                                            <label for="radio4">
                                                VISA
                                            </label>
                                        </div>
                                        <div class="radio radio-info">
                                            <input type="radio" name="payment_method" value="5" id="radio5" disabled>
                                            <label for="radio5">
                                                Mobile Banking
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Card Holder</h4>
                            <hr>
                            <input type="password" class="form-control custom-control" id="field-1" value="">
                            <h5>Expire Date</h5>
                            <hr>
                            <h6>02 - 20 -2022</h6>
                            <div class="order-btn">
                                <button type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                
            </div>
        </div>
    </div>
@endsection