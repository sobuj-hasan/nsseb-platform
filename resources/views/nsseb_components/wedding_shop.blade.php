<!-- wedding shop part  -->
<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 slider-item">
    <div class="product-box">
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


{{-- @section('footer_script')

    <script>
        function wishlist() {
            $( "#wishlist" ).submit();
        }
    </script>

@endsection --}}



