@extends('layouts.dashboard')
@section('title', 'Settings')
@section('active_setting')
    active
@endsection
@section('dashboard_content')
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <style>
        .card-box{
            font-family: poppins;
            box-shadow: 0px 0px 4px 0px #00000040;
        }
    </style>
    <div class="card-box p-5">
        <h4 class="m-t-0 m-b-30 header-title mb-4">Change Password <a class="btn btn-sm btn-info float-right" href="{{ route('dashboard') }}" title=""> Back Profile </a></h4>
        
            <form action="{{ route('user.user.setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="url">Old Password</label>
                <input type="password" name="current_password" value="{{ old('current_password') }}" class="form-control" placeholder="Enter New Password" />
                <div class="text-danger">{{ $errors->first('current_password') }}</div>
            </div>
                
            <div class="form-group">
                <label for="details">New Password</label>
                <input type="password" name="new_password" value="{{ old('new_password') }}" class="form-control" placeholder="Enter New Password" />
                <div class="text-danger">{{ $errors->first('new_password') }}</div>
            </div>
                
            <div class="form-group">
                <label for="name">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Enter Confirm Password" />
                <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
            </div>
                

            <button type="submit" class="btn btn-primary m-r-5">Update Password</button>
            <a class="btn btn-info" href="{{ route('dashboard') }}">Back Profile</a>
        </form> 
    </div>
</div>
@endsection