@extends('vendor.layouts.app')
@section('title','Edit Profile')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Profile</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Merchant</a></li>
                        <li class="breadcrumb-item"><a href="">Edit Profile</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 m-b-30 header-title">Edit Profile <a class="btn btn-primary btn-xs float-right" href="{{ route('vendor.profile') }}" title=""> Back Profile </a></h4>


                     <form role="form" method="post" action="{{ route('vendor.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Merchant Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ Auth::user()->name }}">
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Email address</label> 
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ Auth::user()->email }}">
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" class="form-control" name="phone" id="mobile" placeholder="Enter Mobile" value="{{ Auth::user()->phone }}">
                            <div class="text-danger">
                                {{ $errors->first('phone') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Store Name</label>
                            <input type="text" class="form-control" name="store_name" id="name" placeholder="Enter name" value="{{ Auth::user()->store_name }}">
                            <div class="text-danger">
                                {{ $errors->first('store_name') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Store Address</label>
                            <input type="text" class="form-control" name="store_address" id="name" placeholder="Enter name" value="{{ Auth::user()->store_address }}">
                            <div class="text-danger">
                                {{ $errors->first('store_address') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Activity Type</label>
                            <input type="text" class="form-control" name="activity_type" id="name" placeholder="Enter name" value="{{ Auth::user()->activity_type }}">
                            <div class="text-danger">
                                {{ $errors->first('activity_type') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <img width="80" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ Auth::user()->profile_photo }}" alt="" class="image-responsive image-circle">
                            <br>
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="profile_photo" id="image" placeholder="" value="">
                        </div>
                       
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    </form>
                     
                </div>
            </div>
            <!-- end col -->

            
        </div>
        <!-- end row -->


    </div>



@endsection