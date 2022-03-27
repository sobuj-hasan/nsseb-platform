@extends('vendor.layouts.app')
@section('title','brand list')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Brand</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Merchant</a></li>
                        <li class="breadcrumb-item"><a href="">Brand List</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Brand List</b></h4>

                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-actions-bar">

                            <thead>
                            <tr>
                                <th>SI NO.</th>
                                <th>Name </th>
                                <th>Arabic Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>
                                            <h5>{{ $loop->index + 1 }}</h5>
                                        </td>
                                        <td>
                                            <h5 class="m-b-0 m-t-0 font-600">{{ $brand->name }}</h5>
                                        </td>
                                        <td>
                                            {{ $brand->ar_name }}
                                        </td>
                                        <form method="POST" action="{{ route('vendorbrands.destroy', $brand->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <a href="{{ route('vendorbrands.edit', $brand->id) }}" class="table-action-btn"><i class="far fa-edit"></i></a>
                                                <button onclick="brandDelete()" style="border: none; background:none; cursor:pointer;" type="submit" name="submit" class="table-action-btn"><i class="mdi mdi-close"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                    @empty($brand)
                                        <div class="alert alert-info">
                                            Nothing to show any Brands !
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

@section('footer_script')
    <script>
        function brandDelete(){
            alert('Are you shure ? You want to delete this Brand')
        }
    </script>
@endsection
