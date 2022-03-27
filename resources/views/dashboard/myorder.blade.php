@extends('layouts.dashboard')
@section('title', 'My Orders')
@section('active_order')
    active
@endsection

@section('dashboard_content')
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="information">
            <h6><strong>Account Information :</strong><span> Please use your real Information for profile update to find your best matched pertner.</span></h6>
            @php
                $auth_id = Auth::id();
                $profile_check = App\Models\UserForm::where('user_id', $auth_id)->count();
            @endphp
            @if ($profile_check == 1)
                <a class="btn btn-outline-info ml-3" href="profile.edit"><i class="far fa-edit"></i> Update Profile</a>
                @else
                <a class="btn btn-outline-danger ml-3" href="{{ route('profile.index') }}"><i class="fas fa-plus"></i> Create Profile</a>
            @endif
            <hr>
            <div style="font-family: poppins;" class="card-box p-2">
                <h4 class="mb-4 header-title"><b>Order Details</b></h4>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Payable Amount</th>
                            <th>Order Status </th>
                            <th>Payment Status </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                <a href="{{ route('myorder.show', $order->id ) }}">1010{{ $order->id }}</a>
                            </td>
                            <td>
                                {{ $order->total }} SAR
                            </td>
                            <td>
                                <p class="badge badge-warning p-1">{{ $order->status == "1" ? "pending" : "another way" }}</p>
                            </td>
                            <td>
                                <p class="badge badge-danger p-1">{{ $order->payment_status == "1" ? "Due" : "paid" }}</p>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('myorder.destroy', $order->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="UserOrderDelete()" type="submit" class="btn btn-sm btn-danger"><i class="far fa-window-close"></i></button>
                                    <a href="{{ route('myorder.show', $order->id) }}" type="submit" class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        function UserOrderDelete(){
            alert('Are you shure ? You want to delete this Order !')
        }
    </script>
@endsection






































