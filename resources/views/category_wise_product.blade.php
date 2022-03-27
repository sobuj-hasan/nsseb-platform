@extends('layouts.nsseb')

@section('body')
    <header id="shop-header" class="shop-header main-wrapper">
        <div class="shop-banner-img">
            <div class="shop-banner-bottom">
            </div>

            <div class="banner-content product-details-banner-content">
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
            </div>

        </div>
    </header>
    <!-- Header part End -->

    <!-- Groom Special shop part Here -->
    <div id="wedding-shop" class="wedding wedding-shop">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h4 style="font-family: Playfair Display;font-size: 30px;font-style: normal;font-weight: 400;line-height: 30px;" class="pt-4 pb-5">Category Wise Shop</h4>
                <div class="row m-auto">
                    @foreach ($categoryproducts as $categoryproduct)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="product-box shop">
                                <div class="img-box">
                                    <a href="{{ route('productdetails', $categoryproduct->id) }}">
                                        <img class="product-img" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $categoryproduct->image }}" alt="">
                                    </a>
                                    <a href="#" class="product_id" data-id={{  $categoryproduct->id }}>
                                        <div class="cart-icon">
                                            <img class="cart" src="{{ asset('nsseb_assets/media/icon/shop-icon.svg') }}" alt="">
                                        </div>
                                    </a>
                                    <form id="wishlist" method="POST" action="{{ route('wishlist.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $categoryproduct->id }}" name="product_id">
                                        <div style="cursor: pointer" class="wish-icon" onclick="wishlist()">
                                            <img class="wish" src="{{ asset('nsseb_assets/media/icon/wish-icon.svg') }}" alt="">
                                        </div>
                                    </form>
                                </div>
                                <a href="{{ route('productdetails', $categoryproduct->id) }}">
                                    <h6>{{ $categoryproduct->name }}</h6>
                                </a>
                                <h5>{{ $categoryproduct->sell_price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($categoryproduct)
                        <h5 class="text-danger mt-5 mb-5">Nothing to show products...</h5>
                    @endempty
                </div>
                <!-- Show all button for mobile version -->
                <div class="mobile-show-all">
                    <a href="#">@lang('home.show_all')</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Weekend discount Part -->
    @include('nsseb_components.weekend_discount')

    <!-- Trending item part Here -->
    <div id="wedding-shop" class="wedding wedding-shop trending-item">
        <div class="container">
            <div class="wedding-shop-wrapper">
                <h3>@lang('home.trending_items')</h3>
                <div class="desktop-show-all">
                    <a href="#">@lang('home.show_all')</a>
                </div>
                <div class="row m-auto">
                    @foreach ($trending_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
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
                                    <div class="discount">
                                        <span> -20% </span>
                                    </div>
                                </div>
                                <a href="{{ route('productdetails', $product->id) }}">
                                    <h6>{{ $product->name }}</h6>
                                </a>
                                <h5>{{ $product->sell_price }} @lang('home.currency')</h5>
                            </div>
                        </div>
                    @endforeach
                    @empty($product)
                        <h5 class="text-danger mt-5 mb-5">Nothing to show products...</h5>
                    @endempty
                </div>
                <!-- Show all button for mobile version -->
                <div class="mobile-show-all">
                    <a href="#">@lang('home.show_all')</a>
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
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<500){
                value++;
                document.getElementById('quantity').value = value;
            }
        }
        function decrementValue()
        {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                document.getElementById('quantity').value = value;
            }
        }
    </script>
@endsection


