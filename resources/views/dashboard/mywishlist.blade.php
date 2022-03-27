@extends('layouts.dashboard')
@section('title', 'My Wishlists')
@section('active_wishlist')
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
                <a class="btn btn-outline-info ml-3" href="{{ route('profile.edit', Auth::id()) }}"><i class="far fa-edit"></i> Update Profile</a>
                @else
                <a class="btn btn-outline-danger ml-3" href="{{ route('profile.index') }}"><i class="fas fa-plus"></i> Create Profile</a>
            @endif
            <hr>
            <div class="card-box p-2">
                <h4 class="mb-4 header-title"><b>Wishlist Item</b></h4>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>SI NO</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Buy Now</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($wishlists as $wishlist)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img width="60px" src="{{ asset('nsseb_assets/media/images/product_img/') }}/{{ $wishlist->product->image }}" alt="img" title="contact-img">
                                </td>
                                <td>
                                    <a href="{{ route('productdetails', $wishlist->product->id) }}"> {{ $wishlist->product->name }} </a>
                                </td>
                                <td>
                                <h5> {{ $wishlist->product->sell_price }} SAR</h5>
                                </td>
                                <td>
                                    <a href="#" class="product_id btn btn-info" data-id={{  $wishlist->product->id }}>
                                        add to cart
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('wishlist.destroy', $wishlist->id ) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" onclick="wishlistDelete()" class="btn btn-sm btn-danger">Delete</button>
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
        function wishlistDelete(){
            alert('Are you shure ? You want to delete wishlist product')
        }
    </script>
@endsection








































