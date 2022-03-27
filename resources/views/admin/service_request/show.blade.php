@extends('admin.layouts.app')
@section('title', $single_request->name)
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Request Information</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $single_request->name }}</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title pb-3"><b>{{ $single_request->name }}</b></h4>
                    <div class="table-responsive">
                        <table class="table m-0 table-actions-bar">
                            <tr>
                                <th>Service Name</th>
                                <td>{{ $single_request->service }}</td>
                            </tr>
                            <tr>
                                <th>Candidate Name</th>
                                <td>{{ $single_request->name }}</td>
                            </tr>
                            <tr>
                                <th>Candidate Email</th>
                                <td>{{ $single_request->email }}</td>
                            </tr>
                            <tr>
                                <th>Candidate Phone</th>
                                <td>{{ $single_request->phone }}</td>
                            </tr>
                            <tr>
                                <th>Service Date </th>
                                <td>
                                    {{ Carbon\Carbon::parse($single_request->service_date)->format('d-M-Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Country </th>
                                <td>{{ $single_request->country }}</td>
                            </tr>
                            <tr>
                                <th>City </th>
                                <td>{{ $single_request->city }}</td>
                            </tr>
                            <tr>
                                <th>Address </th>
                                <td>{{ $single_request->address }}</td>
                            </tr>
                            <tr>
                                <th>Description </th>
                                <td>{{ $single_request->message }}</td>
                            </tr>
                            <tr>
                                <th>Reaply Now </th>
                                <td>
                                    <a class="btn btn-primary" href="mailto:{{ $single_request->email }}"> <i class="fa-solid fa-reply"></i> </a>
                                </td>
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
