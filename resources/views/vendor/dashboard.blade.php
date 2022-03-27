@extends('vendor.layouts.app')
@section('title','Vendor panel')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Dashboard</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">

            <div class="col-lg-3 col-md-6 text-center">
                <div style="box-shadow: 2px 2px 12px #e2e2e2;" class="card-box">
                    <h5 class="m-0 text-uppercase font-bold font-secondary text-overflow">Nsseb Users</h5>
                    <h3 class="font-600 mt-4">{{ $users }} +</h3>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6 text-center">
                <div style="box-shadow: 2px 2px 12px #e2e2e2;" class="card-box">
                    <h5 class="m-0 text-uppercase font-bold font-secondary text-overflow">Nsseb Marriage Profile</h5>
                    <h3 class="font-600 mt-4">{{ $merrage_profile }} +</h3>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6 text-center">
                <div style="box-shadow: 2px 2px 12px #e2e2e2;" class="card-box">
                    <h5 class="m-0 text-uppercase font-bold font-secondary text-overflow">Your Products</h5>
                    <h3 class="font-600 mt-4">{{ $products }}</h3>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6 text-center">
                <div style="box-shadow: 2px 2px 12px #e2e2e2;" class="card-box">
                    <h5 class="m-0 text-uppercase font-bold font-secondary text-overflow">Your Order</h5>
                    <h3 class="font-600 mt-4">00</h3>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6 text-center">
                <div style="box-shadow: 2px 2px 12px #e2e2e2;" class="card-box">
                    <h5 class="m-0 text-uppercase font-bold font-secondary text-overflow">Total Categories</h5>
                    <h3 class="font-600 mt-4">{{ $categories }}</h3>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6 text-center">
                <div style="box-shadow: 2px 2px 12px #e2e2e2;" class="card-box">
                    <h5 class="m-0 text-uppercase font-bold font-secondary text-overflow">Total Brand</h5>
                    <h3 class="font-600 mt-4">{{ $brands }}</h3>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6 text-center">
                <div style="box-shadow: 2px 2px 12px #e2e2e2;" class="card-box">
                    <h5 class="m-0 text-uppercase font-bold font-secondary text-overflow">Total Cancel Orders</h5>
                    <h3 class="font-600 mt-4">00</h3>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

    </div> <!-- container -->



@endsection
