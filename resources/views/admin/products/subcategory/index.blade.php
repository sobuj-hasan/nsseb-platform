@extends('admin.layouts.app')
@section('title','Sub-Category list')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Sub-Category</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item"><a href="">Sub-Category List</a></li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>All Sub-Categories List</b></h4>

                    <div class="table-responsive" style="width: 100%">
                        <table class="table table-hover m-0 table-actions-bar">

                            <thead>
                            <tr>
                                <th>SI NO.</th>
                                <th>Parent Category</th>
                                <th>Name</th>
                                <th>Ar Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $categorie)
                                    <tr>
                                        <td>
                                            <h5>{{ $loop->index + 1 }}</h5>
                                        </td>
                                        <td>
                                            <h5 class="m-b-0 m-t-0 font-600">
                                                {{ App\Models\Category::where('id', $categorie->category_id)->first()->name }}
                                            </h5>
                                        </td>
                                        <td>
                                            <h5 class="m-b-0 m-t-0 font-600">{{ $categorie->name }}</h5>
                                        </td>
                                        <td>
                                            {{ $categorie->ar_name ?? "N/A" }}
                                        </td>
                                        <form method="POST" action="{{ route('subcategories.destroy', $categorie->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <a href="{{ route('subcategories.edit', $categorie->id) }}" class="table-action-btn"><i class="far fa-edit"></i></a>
                                                <button onclick="categoryDelete()" style="border: none; background:none; cursor:pointer;" type="submit" name="submit" class="table-action-btn"><i class="mdi mdi-close"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                    @empty($categorie)
                                        <div class="alert alert-info">
                                            Nothing to show any Category !  
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
        function categoryDelete(){
            alert('Are you shure ? You want to delete this Sub-Category')
        }
    </script>
@endsection
