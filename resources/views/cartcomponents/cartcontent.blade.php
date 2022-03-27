<table id="tech-companies-1" class="table  table-striped">
    <thead>
    <tr class="cart-header">
        <th>@lang('home.product')</th>
        <th data-priority="1">@lang('home.size') </th>
        <th data-priority="3">@lang('home.quantity')</th></th>
        <th data-priority="1">@lang('home.total_price')</th>
        <th data-priority="3">@lang('home.action')</th>
    </tr>
    </thead>
    <tbody>
        @foreach(Cart::content() as $cartproduct)
        <tr class="cart-content">
            <td class="product">
                <h5>{{ $loop->index + 1 }}</h5>
                <img width="60px" src="{{ asset('nsseb_assets/media/images/product-img/1634362307.jpg') }}" alt="">
                <h6>{{ $cartproduct->name }}</h6>
            </td>
            <td>
                <p> matching </p>
            </td>
            <td class="quantity">
                <div class="minus">
                    <input class="button" type="button" onclick="decrementValue()" value="-" />
                </div>
                <h4>
                    <input type="text" name="quantity" value="{{ $cartproduct->qty }}" maxlength="2" max="10" size="1" id="number1" />
                </h4>
                <div class="plus">
                    <input class="button" type="button" onclick="incrementValue()" value="+" />
                </div>
            </td>
            <td>
                <h3>@lang('home.currency') {{ $cartproduct->price }}</h3>
            </td>
            <td>
                <div class="remove">
                    <button type="submit"> <i class="fas fa-times"></i> </button>
                </div>
            </td>
        </tr>
        @endforeach
        @section('footer_script')
            <script type="text/javascript">
                function incrementValue()
                {
                    var value = parseInt(document.getElementById('number1').value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value<100){
                        value++;
                            document.getElementById('number1').value = value;
                    }
                }
                function decrementValue()
                {
                    var value = parseInt(document.getElementById('number1').value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value>1){
                        value--;
                        document.getElementById('number1').value = value;
                    }

                }
            </script>
        @endsection
    </tbody>
</table>