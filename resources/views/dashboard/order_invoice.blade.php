@extends('layouts.dashboard')
@section('title', 'My Orders')
@section('active_order')
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
                <a class="btn btn-outline-info ml-3" href="profile.edit"><i class="far fa-edit"></i> Update Profile</a>
                @else
                <a class="btn btn-outline-danger ml-3" href="{{ route('profile.index') }}"><i class="fas fa-plus"></i> Create Profile</a>
            @endif
            <hr>
            <div class="card-box p-2">
                <div class="clearfix">
                    <div class="pull-right">
                        <h3 class="m-0 hidden-print">Invoice</h3>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-6">
                        <h5>Billing Address</h5>
                        <address class="line-h-32">
                            {{ $order->billing->name }}<br>
                            {{ $order->billing->email }}<br>
                            {{ $order->billing->address }}<br>
                            <abbr title="Phone">Phone:</abbr> {{ $order->billing->phone }}
                        </address>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <h4 class="m-t-0 header-title pb-3 mt-4"><b>Order Information</b></h4>
                        <div class="table-responsive">
                            <table class="table m-0 table-actions-bar">
                                <tr>
                                    <th>Order ID</th>
                                    <th>1010{{ $order->id }}</th>
                                </tr>
                                <tr>
                                    <th>Subtotal Price</th>
                                    <th>{{ $order->subtotal }} SAR</th>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <th>{{ $order->total }} SAR</th>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <th>{{ $order->discount }} %</th>
                                </tr>
                                <tr>
                                    <th>Payable Amount</th>
                                    <th>{{ $order->total }} SAR</th>
                                </tr>
                                <tr>
                                    <th>Payment Type</th>
                                    <th>
                                        <h5 class="badge badge-warning">CashOn Delivery</h5>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <th>
                                        <h5 class="badge badge-danger p1">{{ $order->status == "1" ? "Due" : "another way" }}</h5>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <th>{{ $order->created_at->format('d M Y') }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {{-- left side --}}
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <p><b>Sub-total:</b> {{ $order->subtotal }} SAR</p>
                            <p><b>VAT :</b> {{ $order->vat }} SAR</p>
                            <h3>{{ $order->total }} SAR</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="card-box p-2">
                <h4 class="m-t-0 header-title pb-2"><b>Order Details</b></h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SI NO.</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Unit Price </th>
                            <th>Qty </th>
                            <th>Total Price </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->order_details as $order_detail)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <th>
                                    <img width="60px" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $order_detail->product->image }}" alt="img" title="contact-img"/>
                                </th>
                                <th>
                                    <h5>{{ $order_detail->product->name }}</h5>
                                </th>
                                <th>
                                    <h5>{{ $order_detail->unit_price }}</h5>
                                </th>
                                <th>
                                    <h5>{{ $order_detail->qty }}</h5>
                                </th>
                                <th>
                                    <h5>{{ $order_detail->total_price }}</h5>
                                </th>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        function UserOrderDelete(){
            alert('Are you shure ? You want to delete this Order !')
        }
    </script>
@endsection






































