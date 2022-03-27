@extends('vendor.layouts.app')
@section('title',' Order list')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Order Details</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Merchant</a></li>
                        <li class="breadcrumb-item"><a href="">Order Details</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="clearfix">
                        <div class="pull-left">
                            <img src="assets/images/logo_dark.png" alt="" height="30">
                        </div>
                        <div class="pull-right">
                            <h3 class="m-0 hidden-print">Invoice</h3>
                        </div>
                    </div>

                    <div class="row m-t-30">
                        <div class="col-6">
                            <h4>Billing Address</h4>
                            <address class="line-h-32">
                                {{ $myorder->billing->name }}<br>
                                {{ $myorder->billing->email }}<br>
                                {{ $myorder->billing->address }}<br>
                                <abbr title="Phone">Phone:</abbr> {{ $myorder->billing->phone }}
                            </address>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h4 style="margin-top: 20px" class="m-t-0 header-title pb-3 mt-4"><b>Order Information</b></h4>
                            <div class="table-responsive">
                                <table class="table m-0 table-actions-bar">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>1010{{ $myorder->id }}</th>
                                    </tr>
                                    <tr>
                                        <th>Subtotal Price</th>
                                        <th>{{ $myorder->subtotal }} SAR</th>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <th>{{ $myorder->total }} SAR</th>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <th>{{ $myorder->discount }} %</th>
                                    </tr>
                                    <tr>
                                        <th>Payable Amount</th>
                                        <th>{{ $myorder->total }} SAR</th>
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
                                            <h5 class="badge badge-danger p1">{{ $myorder->status == "1" ? "Due" : "another way" }}</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>{{ $myorder->created_at->format('d M Y') }}</th>
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
                                <p><b>Sub-total:</b> {{ $myorder->subtotal }} SAR</p>
                                <p><b>VAT :</b> {{ $myorder->vat }} SAR</p>
                                <h3>{{ $myorder->total }} SAR</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Order Details</b></h4>
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
 

                            @foreach ($myorder->order_details as $order_detail)
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
    </div>
@endsection


