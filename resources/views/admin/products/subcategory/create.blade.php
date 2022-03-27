@extends('admin.layouts.app')
@section('title','Create Sub-Category')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Create New</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item"><a href="">Create Sub-Category</a></li>
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
                        <h4 class="modal-title">Create Sub-Category</h4>
                    </div>
                    <form method="POST" action="{{ route('subcategories.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Select Parent Category</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">Select Parent Category</option>
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
                                        <label for="field-1" class="control-label">Sub-Category Name</label>
                                        <input type="text" class="form-control" id="field-1" placeholder="English name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Arabic Name</label>
                                        <input type="text" class="form-control" id="field-2" placeholder="Arabic name" name="ar_name" value="{{ old('ar_name'); }}">
                                        @error('ar_name')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('subcategories.index') }}" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</a>
                            <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


