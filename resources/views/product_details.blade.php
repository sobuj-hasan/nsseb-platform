@php
    $local = app()->getLocale();
@endphp
@extends('layouts.nsseb')
@section('title', 'Product Details')
@section('body')
    <header id="shop-header" class="shop-header main-wrapper">
        <div class="shop-banner-img py-5">
            <div class="shop-banner-bottom">
            </div>

            <div class="banner-content product-details-banner-content py-5">
                <div class="order-item">
                    <div class="order-btn"> 
                        <a class="" href="{{ route('cart') }}"> 
                            <i class="fas fa-shopping-cart"></i> &nbsp; @lang('home.order')
                            <span class="number-count">
                                <div class="shoppingcartshow"></div>
                            </span>
                        </a>
                    </div>
                    <div class="wishlist-btn">
                        <a class="" href="{{ route('my.wishlist') }}"> 
                            <i class="far fa-heart"></i> &nbsp; @lang('home.wishlist')
                            <span class="number-count"><p> {{ App\Models\Wishlist::where('user_id', Auth::id() ?? '')->count() }} </p></span>
                        </a>
                    </div>
                </div>
                <div class="container py-lg-3">
                    <div class="search-bar">
                        <form method="GET" action="{{ route('productsearch') }}">
                            <input class="search-input" type="text" class="form-control" value="" name="query" placeholder="@lang('home.product_search_here')" required>
                            <button type="submit"><i class="fas fa-search"></i></button><br>
                            @error('query')
                                <h5 class="text-danger mt-2 ml-0">{{ $message }}</h5>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- Header part End -->

    <!-- Category Part Here -->
    {{-- <div id="category" class="wedding category category-hide-fon-mobile">
        <div class="container">
            <div class="wedding-shop-wrapper category-wrapper">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="category-part">
                            <div class="category-header">
                                <h3>Category</h3>
                            </div>
                            <div class="single-category">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ url('category-wise-shop', $category->id) }}">{{ $category->name }}</a>
                                            <span><i class="fas fa-chevron-right right-icon"></i></span>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="product-show">
                            <div class="row m-auto">
                                @foreach ($latest_products as $latest_product)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="product-box">
                                            <div class="img-box">
                                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                                    <img class="product-img" src="{{ asset('nsseb_assets/media/images/product-img') }}/{{ $latest_product->image }}" alt="">
                                                </a>
                                                <a href="#">
                                                    <div class="cart-icon">
                                                        <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="wish-icon">
                                                        <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <a href="{{ route('productdetails', $latest_product->id) }}">
                                                <h6>{{ $latest_product->name }}</h6>
                                            </a>
                                            <h5>{{ $latest_product->price }} SAR</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Product Details part Here -->
    <div id="product-details" class="product-details">
        <div class="container">
            <div class="product-desc-wrap">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                        <div class="multiple-img">
                            @foreach ($multipleimage as $images)
                                <div class="img-box">
                                    <img class="small-img1 small-img" src="{{ asset('nsseb_assets/media/images/multiple_photo') }}/{{ $images->image_name }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12">
                        <div class="big-img-box">
                            <img class="big-img" id="imagezoom" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $singleproduct->image }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-desc-box">
                            <div class="product-desc">
                                <h3>{{ $singleproduct->name }}</h3>
                                <h5><span>@lang('home.brand')</span> {{ $singleproduct->brand?$singleproduct->brand->name:'' }}</h5>
                                <h6>@lang('home.short_description')</h6>
                                <p>  {{ Str::limit($singleproduct->short_description, 285, $end='..') }} </p>
                                <h4> <span>@lang('home.price')&nbsp;</span> @lang('home.currency') {{ $singleproduct->price }} <del> {{ $singleproduct->price }} </del></h4>
                                <div class="user-select">
                                    <div class="color">
                                        <h3>@lang('home.color')</h3>
                                        <div class="custom-check">
                                            <input class="color1" type="button" value="">
                                            <input class="color2" type="button" value="">
                                            <input class="color3" type="button" value="">
                                            <input class="color4" type="button" value="">
                                        </div>
                                    </div>

                                    <div class="size">
                                        <h3>@lang('home.size')</h3>
                                        <select id="inputState" class="custom-input" data-id="">
                                            <option class="option-text" value="0" selected> Select </option>
                                            <option class="option-text" value="XS"> XS </option>
                                            <option class="option-text" value="S"> S </option>
                                            <option class="option-text" value="M"> M </option>
                                            <option class="option-text" value="L"> L </option>
                                            <option class="option-text" value="XL"> XL </option>
                                            <option class="option-text" value="2XL"> 2XL </option>
                                        </select>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="quantity">
                                        <h3>@lang('home.quantity')</h3>
                                        <input class="increment" type="button" onclick="decrementValue()" value="-" />
                                        <input type="text" name="quantity" id="quantity" value="1" maxlength="3" max="500"/>
                                        <input class="decrement" type="button" onclick="incrementValue()" value="+" />
                                    </div>
                                    <div class="addtocart-btn">
                                        <a href="#" type="submit" id="detail_product_id" data-id={{ $singleproduct->id }}>@lang('home.add_to_cart')</a>
                                    </div>
                                    <form id="save_later_form" method="POST" action="{{ route('savelater.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $singleproduct->id }}" name="product_id">
                                        <div class="savefor-late">
                                            <a href="javascript:{}" onclick="document.getElementById('save_later_form').submit();">@lang('home.save_for_later')</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product description Review part -->
    <div id="product-desc" class="product-desc">
        <div class="container">
            <div class="discription-part-wrapper">
                <div class="row mt-60">
                    <div class="col-12">
                        <div class="single-product-menu">
                            <ul class="nav">
                                <li><a class="active show" data-toggle="tab" href="#description">@lang('home.description')</a> </li>
                                {{-- <li><a data-toggle="tab" href="#review" class="">Review (35)</a></li> --}}
                                <li><a data-toggle="tab" href="#tag" class="">@lang('home.faq')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="description">
                                <div class="description-wrap">
                                    <p>
                                      {!! $singleproduct->long_description !!}
                                    </p>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="tag">
                                <div class="faq-wrap" id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo3"
                                                    aria-expanded="false" aria-controls="collapseTwo">How long does it take you to
                                                    deliver the product in Dhaka ?</button></h5>
                                        </div>
                                        <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"
                                            style="">
                                            <div class="card-body">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap into electronic typesetting,
                                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                                publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo5"
                                                    aria-expanded="false" aria-controls="collapseTwo">If I don't like the product at the
                                                    time of delivery, can I get a refund by returning the product?</button></h5>
                                        </div>
                                        <div id="collapseTwo5" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                It is a long established fact that a reader will be distracted by the readable content
                                                of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                                here', making it look like readable English.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo6"
                                                    aria-expanded="false" aria-controls="collapseTwo">What is your Name ?</button></h5>
                                        </div>
                                        <div id="collapseTwo6" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap into electronic typesetting,
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo7"
                                                    aria-expanded="false" aria-controls="collapseTwo">Deliver your product on cash on
                                                    delivery ?</button></h5>
                                        </div>
                                        <div id="collapseTwo7" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                It is a long established fact that a reader will be distracted by the readable content
                                                of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                                here', making it look like readable English.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="tab-pane" id="review">
                                <div class="review-wrap">
                                    <ul>
                                        <li class="review-items">
                                            <div class="review-img">
                                                <img src="{{ asset('nsseb_assets/media/images/profile-img/default.png') }}" alt="">
                                            </div>
                                            <div class="review-content">
                                                <h3><a href="#">Nature Honey</a></h3>
                                                <span>17 Oct 2021</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                                    elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et
                                                    messages in con sectetur posuere dolor non.</p>
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="add-review">
                                    <h4>Add A Review</h4>
                                    <div class="ratting-wrap">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>task</th>
                                                    <th>1 Star</th>
                                                    <th>2 Star</th>
                                                    <th>3 Star</th>
                                                    <th>4 Star</th>
                                                    <th>5 Star</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>How Many Stars?</td>
                                                    <td>
                                                        <input type="radio" name="a">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="a">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="a">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="a">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="a">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <h4>Name:</h4>
                                            <input type="text" placeholder="Your name here...">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h4>Email:</h4>
                                            <input type="email" placeholder="Your Email here...">
                                        </div>
                                        <div class="col-12">
                                            <h4>Your Review:</h4>
                                            <textarea name="massage" id="massage" cols="30" rows="10"
                                                placeholder="Your review here..."></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn-style">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="divider-div2"></div>

    <!-- Related product part Here -->
    <div id="wedding-shop" class="wedding wedding-shop jewellery-shop related-product">
        <div class="container">
            <div class="wedding-shop-wrapper ">
                <h3>@lang('home.related_product')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto">
                    @foreach ($related_products as $related_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $related_product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $related_product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $related_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $related_product->id }}" name="product_id">
                                        <div style="cursor: pointer" class="wish-icon" onclick="wishlist()">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                    <div class="discount">
                                        <span> -20% </span>
                                    </div>
                                </div>
                                <a href="{{ route('productdetails', $related_product->id) }}">
                                    <h6>{{ $related_product->name }}</h6>
                                </a>
                                <h5>{{ $related_product->price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($related_product)
                        <h6 class="text-danger mt-5 mb-5">Nothing to show related products...</h6>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <!-- Groom Special shop part Here -->
    <div id="wedding-shop" class="wedding wedding-shop">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.groom_special')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto groom-special-slider-two">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <div style="cursor: pointer" class="wish-icon" onclick="wishlist()">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                </div>
                                <a href="{{ route('productdetails', $product->id) }}">
                                    <h6>{{ $product->name }}</h6>
                                </a>
                                <h5>{{ $product->price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($product)
                        <h5 class="text-danger mt-5 mb-5">Nothing to show products...</h5>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <!-- Women body Care shop part Here -->
    <div id="wedding-shop" class="wedding wedding-shop women-shop">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.women_boy_care')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto women-body-care-slider2">
                    @foreach ($latest_products as $latest_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $latest_product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $latest_product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                        <div style="cursor: pointer" class="wish-icon" onclick="wishlist()">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                </div>
                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                    <h6>{{ $latest_product->name }}</h6>
                                </a>
                                <h5>{{ $latest_product->price }} hr</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($latest_product)
                        <h5 class="text-danger mt-5 mb-5">Nothing to show products...</h5>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <!-- Weekend discount Part -->
    @include('nsseb_components.weekend_discount')

    <!-- Jewellery shop part Here -->
    <div id="wedding-shop" class="wedding wedding-shop jewellery-shop">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.wedding_jewellery')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto wedding-jewelary-slider2">
                    @foreach ($latest_products as $latest_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $latest_product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $latest_product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                        <div style="cursor: pointer" class="wish-icon" onclick="wishlist()">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                    <div class="discount">
                                        <span> -10% </span>
                                    </div>
                                </div>
                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                    <h6>{{ $latest_product->name }}</h6>
                                </a>
                                <h5>{{ $latest_product->price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($latest_product)
                        <h5 class="text-danger mt-5 mb-5">Nothing to show products...</h5>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <!-- Trending item part Here -->
    <div id="wedding-shop" class="wedding wedding-shop trending-item">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.trending_items')</h3>
                <div class="desktop-show-all">
                    <a href="">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto trending-product-slider2">
                    @foreach ($latest_products as $latest_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $latest_product->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $latest_product->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $latest_product->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $latest_product->id }}" name="product_id">
                                        <div style="cursor: pointer" class="wish-icon" onclick="wishlist()">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                    <div class="discount">
                                        <span> -20% </span>
                                    </div>
                                </div>
                                <a href="{{ route('productdetails', $latest_product->id) }}">
                                    <h6>{{ $latest_product->name }}</h6>
                                </a>
                                <h5>{{ $latest_product->price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($latest_product)
                        <h5 class="text-danger mt-5 mb-5">Nothing to show products...</h5>
                    @endempty
                </div>
            </div>
        </div>
    </div>
    <div class="shop-divider"></div>
@endsection

@section('footer_script')
    <script>
        // wishlist form submit
        function wishlist() {
            $( "#wishlist" ).submit();
        }
        
        // Magnify image viewer
        $("#imagezoom").imagezoomsl({
            zoomrange:[2,3],
        });

        // Image view and change click
        $(".small-img").click(function(){
            $(".big-img").attr('src',$(this).attr('src'));
        });

        // onclick product quantity increment decrement
        function incrementValue()
        {
            var value = parseInt($('#quantity').val(), 10);
            value = isNaN(value) ? 0 : value;
            if(value<500){
                value++;
                $('#quantity').attr('value',value);
            }
        }
        function decrementValue()
        {
            var value = parseInt($('#quantity').val(), 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $('#quantity').attr('value',value);
            }
        }
    </script>
@endsection






