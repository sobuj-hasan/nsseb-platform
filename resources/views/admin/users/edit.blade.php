@extends('admin.layouts.app')
@section('title','Profile')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">User Profile</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item"><a href="">User profile</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="modal-content">
                    <form method="POST" action="{{ route('users.update', $userdata->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="p-10 task-detail">
                                <div class="media m-t-0 m-b-20">
                                    <img class="d-flex mr-3 rounded-circle" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $userdata->profile_photo }}" alt="Generic placeholder image" height="48">
                                    <div class="media-body">
                                        <h5 class="media-heading m-b-5 mt-0">{{ $userdata->name }}</h5>
                                        <span class="label label-danger">{{ $userdata->created_at->format('d-M-Y') }}</span>
                                    </div>
                                </div>

                                <h4 class="font-600 m-b-20">({{ $userdata->name }}) Profile Information</h4>

                                <p class="text-muted">
                                    User About :
                                </p>

                                <ul class="list-inline task-dates m-b-0 m-t-20">
                                    <li>
                                        <h5 class="font-600 m-b-5">Name :</h5>
                                        <p> {{ $userdata->name }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Phone No :</h5>
                                        <p> {{ $userdata->phone }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Email Address :</h5>
                                        <p> {{ $userdata->email }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Store Name :</h5>
                                        <p> {{ $userdata->store_name }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Store Address :</h5>
                                        <p> {{ $userdata->store_address }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Activity Type :</h5>
                                        <p> {{ $userdata->activity_type }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Gender :</h5>
                                        <p> {{ $userdata->gender }}</p>
                                    </li>

                                    <li>
                                        <h5 class="font-600 m-b-5">Age :</h5>
                                        <p> {{ $userdata->age }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Nationality :</h5>
                                        <p> {{ $userdata->nationality }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Education :</h5>
                                        <p> {{ $userdata->education }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Height :</h5>
                                        <p> {{ $userdata->height }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Weight :</h5>
                                        <p> {{ $userdata->weight }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Social Status :</h5>
                                        <p> {{ $userdata->social_status }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Children :</h5>
                                        <p> {{ $userdata->children }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Tribe :</h5>
                                        <p> {{ $userdata->tribe }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Occupation :</h5>
                                        <p> {{ $userdata->occupation }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Workplace :</h5>
                                        <p> {{ $userdata->workplace }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Salary :</h5>
                                        <p> {{ $userdata->salary }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Living Place :</h5>
                                        <p> {{ $userdata->living_place }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Attributes Trait :</h5>
                                        <p> {{ $userdata->attributes_trait }}</p>
                                    </li>
                                    <li>
                                        <h5 class="font-600 m-b-5">Profile Photo :</h5>
                                        <img height="120" width="120" class="d-flex mr-3" src="{{ asset('nsseb_assets/media/images/profile_img') }}/{{ $userdata->profile_photo }}" alt="Generic placeholder image">
                                    </li>

                                    <li>
                                        <h5 class="font-600 m-b-5">Join Date :</h5>
                                        <p> {{ $userdata->created_at->format('d-M-Y') }}</p>
                                    </li>

                                    <li>
                                        <h5 class="font-600 m-b-5">Role Management :</h5>
                                        <select class="form-control" name="role" required>
                                            <option value="{{ $userdata->role }}" class="selected"> @php if ($userdata->role == 1) { echo "admin"; }elseif($userdata->role == 2){echo "Marchent";}else{echo "user";} @endphp </option>
                                            <option value="3">Make user</option></option>
                                            <option value="2">Make marchent</option></option>
                                            <option value="1">Make admin</option></option>
                                        </select>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <div class="attached-files m-t-30">
                                    <!-- use for margin bottom -->
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button onclick="myFunction()" type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                            <a href="{{ route('users.index') }}" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer_script')
    <script>
        function myFunction() {
            alert('Are You Shure ? You Change this user role !');
        }
    </script>
@endsection





