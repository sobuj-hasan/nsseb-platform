<div class="total">
    <h3>@lang('home.subtotal') = &nbsp;&nbsp;<span> {{ Cart::subtotal() }} </span></h3>
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @lang('home.vat') =  &nbsp;&nbsp;<span> {{ Cart::tax() }} </span></h4>
    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @lang('home.total') = &nbsp;&nbsp;<span> {{ Cart::total() }} </span></h5>
</div>
