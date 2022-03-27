@extends('vendor.layouts.app')
@section('title','product create')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Create New</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Merchant</a></li>
                        <li class="breadcrumb-item"><a href="">Create Product</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Product</h4>
                    </div>
                    <form method="POST" action="{{ route('vendorproducts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Select Category</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select Category one</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Select Sub-Category</label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                            <option value="">Select Category one</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Name</label>
                                        <input type="text" class="form-control" id="field-1" placeholder="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Select Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="">Select Brand one</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Product Price</label>
                                        <input type="text" class="form-control" id="field-1" placeholder="price" name="price" value="{{ old('price') }}" required>
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Stock Amount</label>
                                        <input type="number" class="form-control" id="field-1" placeholder="stock " name="stock" value="{{ old('stock') }}" required>
                                        @error('stock_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="field-1" class="control-label">Image <span class="text-light"> &nbsp;(Width : 300px Height: 400px)</span></label><br>
                                    <button type="button" class="btn btn-secondary btn-file">
                                        <input type="file" class="btn-secondary" name="image" class="form-control" />
                                    </button><br>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="field-1" class="control-label">Multiple Images <span class="text-light"></span></label><br>
                                    <button type="button" class="btn btn-secondary btn-file">
                                        <input style="width: 100%" type="file" class="btn-secondary" multiple name="image_name[]" class="form-control" />
                                    </button><br>
                                    @error('image_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Short Description</label>
                                        <textarea class="form-control" rows="1" id="field-1" placeholder="Here short description" name="short_description" required>{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Discount</label>
                                        <input type="number" class="form-control" id="field-1" placeholder="discount 10% or 200 SAR " name="discount" value="{{ old('discount') }}">
                                        @error('discount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Long Description</label><br>
                                        <textarea class="summernote" cols="90" rows="1" placeholder="Design Product long description.." name="long_description">
                                            {{ old('long_description') }}
                                        </textarea>
                                        @error('long_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('vendorproducts.index') }}" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</a>
                            <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Upload Now</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <div id="getSubcategory" data-url="{{ route('get.vendorsubcategory')}}"></div>

@endsection

@section('footer_script')
    <script>
    $(document).ready(function(){
            
            $('#category_id').on('change', function(){

            var category_id =  $(this).val();

            
            var url = $('#getSubcategory').data("url");

            $.ajax({
                url: url,
                data: {category_id:category_id},
                type: "GET",
                success: function(response){
                    $('#subcategory_id').html(response);
                },  
            });
            });

        });



    </script>
    <script>
        jQuery(document).ready(function(){
            $('.summernote').summernote({
                height: 150,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
            $('.inline-editor').summernote({
                airMode: true
            });
        });
    </script>
@endsection


