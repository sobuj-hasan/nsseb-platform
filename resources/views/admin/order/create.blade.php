@extends('admin.layouts.app')
@section('title',' Cancel Order')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Cancel Order </h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Cancel Order List</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Cancel Order</b></h4>

                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-actions-bar">

                            <thead>
                            <tr>
                                <th>Order ID.</th>
                                <th>Date </th>
                                <th>Payment Status </th>
                                <th>Subtotal</th>
                                <th>Payable Amount</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th>
                                            <a href="{{ route('orders.show', $order->id ) }}">1010{{ $order->id }} <i class="fas fa-caret-up"></i></a>
                                        </th>

                                        <th>
                                            {{ $order->created_at->format('d M Y') }}
                                        </th>

                                        <th>
                                            <h5 class="badge badge-danger p-2">{{ $order->payment_status == "1" ? "Due" : "paid" }}</h5>
                                        </th>

                                        <th>
                                            {{ $order->subtotal }} SAR
                                        </th>

                                        <th>
                                            {{ $order->total }} SAR
                                        </th>

                                        <th>
                                            <h5 class="badge badge-danger p-2"> Cancled </h5>
                                        </th>

                                        <th>
                                            <h5 class="badge badge-danger p-2"> already cancelled </h5>
                                        </th>
                                    </tr>
                                    @empty($order)
                                        <div class="alert alert-danger">
                                            Nothing to show any Blog post !
                                        </div>
                                    @endempty
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
