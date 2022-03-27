<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\UserForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        $users = User::count();
        $marriage_profile = UserForm::count();
        $total_orders = Order::count();
        $total_products = Product::count();
        $total_blogs = Blog::count();
        $total_categories = Category::count();
        $total_brands = Brand::count();
        return view('admin.dashboard', compact('users', 'marriage_profile', 'total_orders', 'total_products', 'total_blogs', 'total_categories', 'total_brands'));
    }
}
