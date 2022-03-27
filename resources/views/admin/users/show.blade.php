@extends('admin.layouts.app')
@section('title', 'User Details')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">User Details</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item"><a href="">{{ $user->name }}</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title pb-3"><b>{{ $user->name }}</b></h4>
                    <div class="table-responsive">
                        <table class="table m-0 table-actions-bar">
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Store Name</th>
                                <td>{{ $user->store_name }}</td>
                            </tr>
                            <tr>
                                <th>Store Address</th>
                                <td>{{ $user->store_address }}</td>
                            </tr>
                            <tr>
                                <th>Activity type</th>
                                <td>{{ $user->activity_type }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>{{ $user->age }}</td>
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td>{{ $user->nationality }}</td>
                            </tr>
                            <tr>
                                <th>Education</th>
                                <td>{{ $user->education }}</td>
                            </tr>
                            <tr>
                                <th>Height</th>
                                <td>{{ $user->height }}</td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td>{{ $user->weight }}</td>
                            </tr>
                            <tr>
                                <th>Social Status</th>
                                <td>{{ $user->social_status }}</td>
                            </tr>
                            <tr>
                                <th>Children</th>
                                <td>{{ $user->children }}</td>
                            </tr>
                            <tr>
                                <th>Tribe</th>
                                <td>{{ $user->tribe }}</td>
                            </tr>
                            <tr>
                                <th>Occupation</th>
                                <td>{{ $user->occupation }}</td>
                            </tr>
                            <tr>
                                <th>Workplace</th>
                                <td>{{ $user->workplace }}</td>
                            </tr>
                            <tr>
                                <th>Salary</th>
                                <td>{{ $user->salary }}</td>
                            </tr>
                            <tr>
                                <th>Living Place</th>
                                <td>{{ $user->living_place }}</td>
                            </tr>
                            <tr>
                                <th>Attributes Trait</th>
                                <td>{{ $user->attributes_trait }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img width="100" src="{{ asset('nsseb_assets/media/images/profile_img/'. $user->profile_photo) }}" alt=""></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('footer_script')
    <script>
        function productDelete(){
            alert('Are you shure ? You want to delete this Category')
        }
    </script>
@endsection
