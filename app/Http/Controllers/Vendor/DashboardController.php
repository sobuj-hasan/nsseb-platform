<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['users'] = User::all()->count();
        $data['categories'] = Category::all()->count();
        $data['brands'] = Brand::all()->count();
        $data['merrage_profile'] = User::where('role', 3)->count();
        $data['products'] = Product::where('user_id', Auth::user()->id)->count();
        return view('vendor.dashboard', $data);
    }
}
