@extends('layouts.dashboard')
@section('title', 'Profile Photos')
@section('active_photos')
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
                <a class="btn btn-outline-info ml-3" href="{{ route('profile.edit', Auth::id()) }}"><i class="far fa-edit"></i> Update Profile</a>
                @else
                <a class="btn btn-outline-danger ml-3" href="{{ route('profile.index') }}"><i class="fas fa-plus"></i> Create Profile</a>
            @endif
            <hr>

            <div id="gallery" class="container-fluid">
                @foreach ($photos as $photo)
                    <img src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $photo->image }}" class="img-responsive">
                @endforeach
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h6 class="mt-4"> <strong>Upload Your Photos</strong> </h6>

                <form method="POST" action="{{ route('account.photos.upload') }}" enctype="multipart/form-data">
                    @csrf
                        <button type="button" class="btn btn-secondary btn-file mb-4">
                            <input type="file" class="btn-secondary" name="image" class="form-control" />
                        </button>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    <button type="submit" class="btn btn-success mb-4"> Upload </button>
                </form>

            </div>
        </div>
    </div>
@endsection








































