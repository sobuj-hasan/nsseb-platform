@extends('layouts.nsseb')
@section('title', 'Cart')
@section('body')
    <div id="cart" class="cart-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h2>@lang('home.shopping_cart')</h2>
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div id="cartcontentshow">

                                </div>
                            </div>
                        </div>
                        <div class="pay-info">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="more-shop">
                                        <a href="{{ route('shop') }}"><i class="fas fa-chevron-left"></i>&nbsp; @lang('home.shop_more')</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div id="cartsummaryshow">
                                        
                                    </div>
                                    <div class="checkout-btn">
                                        <a href="{{ route('checkout') }}">@lang('home.process_to_checkout') <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





