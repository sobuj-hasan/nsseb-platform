@extends('admin.layouts.app')
@section('title',' Blog details')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Blog Details</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog Details</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 style="margin-top: 20px" class="m-t-0 header-title pb-3 mt-4"><b>{{ $blog->title }}</b></h4>
                    <div class="table-responsive">
                        <table class="table m-0 table-actions-bar">
                            <tr>
                                <th>Blog Title</th>
                                <td>{{ $blog->title }}</td>
                            </tr>
                            <tr>
                                <th>Blog Image</th>
                                <td><img width="100" src="{{ asset('nsseb_assets/media/images/blog_img/') }}/{{ $blog->image }}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Blog Description</th>
                                <td>{!! $blog->description !!}</td>
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
        function OrderDelete(){
            alert('Are you shure ? You want to delete this Order !')
        }
    </script>
@endsection
