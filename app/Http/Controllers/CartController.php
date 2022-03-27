<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{


    public function add_to_cart(Request $request)
    {
        $product_id = $request->product_id;

        $product = Product::find($product_id);


        $data['qty']    = 1;
        $data['id']     = $product_id;
        $data['name']   = $product->name;
        $data['price']  = $product->price;
        $data['weight'] = '1';
        $data['options']['image'] = $product->image;

        Cart::add($data);

        return response()->JSON();
    }

    public function details_add_to_cart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $product = Product::find($product_id);


        $data['qty']    = $quantity;
        $data['id']     = $product_id;
        $data['name']   = $product->name;
        $data['price']  = $product->price;
        $data['weight'] = '1';
        $data['options']['image'] = $product->image;

        Cart::add($data);

        return response()->JSON();
    }

    // public function add_to_wishlist(Request $request)
    // {
    //     if (!Auth::user()) {
    //         Notify::error('Need Login first !', 'Error');
    //         return redirect()->route('login');
    //     }

    //     $wish_id = $request->wish_id;

    //     return Wishlist::where('user_id', Auth::user()->id)->where('product_id', $wish_id);

    //     $data['user_id']    = Auth::user()->id;
    //     $data['product_id']     = $wish_id;

    //     Wishlist::add($data);

    //     return response()->JSON();
    // }


    public function cartproductcount()
    {
        return view('cartcomponents.count');
    }

    public function cartcontent()
    {
        return view('cartcomponents.cartcontent');
    }

    public function cartsummary()
    {
        return view('cartcomponents.cartsummary');
    }


}
