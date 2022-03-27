@extends('admin.layouts.app')
@section('title','Service Request list')
@section('content')

 <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">All Request</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item"><a href="">Service Request List</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title pb-3"><b>All Request List</b></h4>

                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-actions-bar">
                            <thead>
                            <tr>
                                <th>SI NO.</th>
                                <th>Service Name</th>
                                <th>Candidate Name</th>
                                <th>Phone No.</th>
                                <th>Email Address</th>
                                <th>Service Date</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($service_request as $request)
                                    <tr>
                                        <td>
                                            <h5>{{ $loop->index + 1 }}</h5>
                                        </td>
                                        <td>
                                            <a href="{{ route('request.show', $request->id) }}">{{ $request->service }}</a>
                                        </td>
                                        <td>
                                            <h5>{{ $request->name }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $request->phone }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $request->email }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $request->service_date }}</h5>
                                        </td>
                                        <form method="POST" action="{{ route('request.destroy', $request->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <a href="mailto:{{ $request->email }}" class="table-action-btn text-primary"><i class="fa-solid fa-paper-plane"></i></a>
                                                <button onclick="productDelete()" style="border: none; background:none; cursor:pointer; color: red;" type="submit" name="submit" class="table-action-btn"><i class="mdi mdi-close"></i></button>
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
            alert('Are you shure ? You want to delete this Service Request')
        }
    </script>
@endsection
