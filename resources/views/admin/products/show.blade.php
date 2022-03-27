@extends('admin.layouts.app')
@section('title', $product->name)
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">All Products</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title pb-3"><b>{{ $product->name }}</b></h4>
                    <div class="table-responsive">
                        <table class="table m-0 table-actions-bar">
                            <tr>
                                <th>Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ App\Models\Category::where('id', $product->category_id)->first()->name }}</td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <td>
                                    {{ App\Models\Brand::where('id', $product->brand_id)->first()->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Available Stock</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ $product->short_description }}</td>
                            </tr>
                            <tr>
                                <th>Long Description</th>
                                <td>{!! $product->long_description !!}</td>
                            <tr>
                                <th>Image</th>
                                <td><img width="100" src="{{ asset('nsseb_assets/media/images/product_img/'. $product->image) }}" alt=""></td>
                            </tr>
                            <tr>
                                <th>Multiple Image</th>
                                <td>
                                    @foreach ($multiple_image as $images)
                                        <img width="100" src="{{ asset('nsseb_assets/media/images/multiple_photo/'. $images->image_name) }}" alt="">&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endforeach
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
