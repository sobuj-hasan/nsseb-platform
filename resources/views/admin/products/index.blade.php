@extends('admin.layouts.app')
@section('title','product list')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">All Products</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item"><a href="">products List</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title pb-3"><b>All Product List</b></h4>

                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-actions-bar">
                            <thead>
                            <tr>
                                <th>SI NO.</th>
                                <th>Image </th>
                                <th>Name </th>
                                <th>Created By</th>
                                <th>Category</th>
                                <th>Price </th>
                                <th>Stock Amount </th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <h5>{{ $loop->index + 1 }}</h5>
                                        </td>
                                        <td>
                                            <img width="60px" src="{{ asset('nsseb_assets/media/images/product_img') }}/{{ $product->image }}" alt="img" title="contact-img"/>
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </td>
                                        <td>
                                            {{ App\Models\User::where('id', $product->user_id)->first()->name }}
                                        </td>
                                        <td>
                                            {{ App\Models\Category::where('id', $product->category_id)->first()->name }}
                                        </td>
                                        <td>
                                            {{ $product->price }} SAR
                                        </td>
                                        <td>
                                            {{ $product->stock }}
                                        </td>

                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}" class="table-action-btn"><i class="far fa-edit"></i></a>
                                                <button onclick="productDelete()" style="border: none; background:none; cursor:pointer;" type="submit" name="submit" class="table-action-btn"><i class="mdi mdi-close"></i></button>
                                            </td>
                                        </form>
                                    </tr>
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
        function productDelete(){
            alert('Are you shure ? You want to delete this Category')
        }
    </script>
@endsection
