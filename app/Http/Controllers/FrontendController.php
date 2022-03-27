<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Billing;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserForm;
use App\Models\Wishlist;
use App\Models\BlogCategory;
use App\Models\ContactFormSubmit;
use Illuminate\Http\Request;
use App\Models\MultipleImage;
use App\Models\ProfilePhoto;
use App\Models\ServiceRequest;
use Idemonbd\Notify\Facades\Notify;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    function index(){
        $last_blog = Blog::orderBy('id', 'desc')->first();
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        $recommend_blog = Blog::inRandomOrder()->limit(8)->get();
        $couch_category = Category::where('name', 'wedding couch')->first()->id;
        $wedding_products = Product::where('category_id', '!=', $couch_category)->inRandomOrder()->limit(80)->get();
        $marriage_profile = User::where('role', 3)->inRandomOrder()->limit(40)->get();
        $wedding_couch = Product::where('category_id', $couch_category)->inRandomOrder()->limit(40)->get();
        return view('index', compact('wedding_products', 'blogs', 'last_blog', 'recommend_blog', 'marriage_profile', 'wedding_couch'));
    }

    function home(){
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        $last_blog = Blog::orderBy('id', 'desc')->first();
        $couch_category = Category::where('name', 'wedding couch')->first()->id;
        $wedding_products = Product::where('category_id', '!=', $couch_category)->inRandomOrder()->limit(80)->get();
        return view('home', compact('wedding_products', 'blogs', 'last_blog'));
    }

    function searchresult(){
        $couch_category = Category::where('name', 'wedding couch')->first()->id;
        $wedding_products = Product::where('category_id', '!=', $couch_category)->inRandomOrder()->limit(80)->get();
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        $last_blog = Blog::orderBy('id', 'desc')->first();
        $marriage_profile = User::where('role', 3)->inRandomOrder()->limit(8)->get();
        $top_profile = User::where('role', 3)->inRandomOrder()->limit(4)->get();
        $new_profile = User::where('role', 3)->latest()->limit(12)->get();
        return view('search_result', compact('wedding_products', 'last_blog', 'blogs', 'marriage_profile', 'top_profile', 'new_profile'));
    }

    function profilesearchresult(Request $request){
        $request->validate([
            'sex' => 'required',
            'nationality' => 'required',
            'education' => 'required',
            'tribe' => '',
            'living_place' => 'required',
            'social_status' => 'required',
            'minimum_age' => 'required',
            'maximum_age' => 'required',
        ]);
        $gender = $request->sex;
        $minimum_age = $request->minimum_age;
        $maximum_age = $request->maximum_age;
        $religion = $request->tribe;
        $search_results = User::where('gender', 'like', "$gender")
                                    ->orwhere('age', '>', "$minimum_age")
                                    ->orwhere('age', '<', "$maximum_age")
                                    ->orwhere('religion', 'like', "%$religion%")
                                    ->orwhere('role', 3)
                                    ->get();
        $couch_category = Category::where('name', 'wedding couch')->first()->id;
        $wedding_products = Product::where('category_id', '!=', $couch_category)->inRandomOrder()->limit(80)->get();
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        $marriage_profile = User::where('role', 3)->inRandomOrder()->limit(8)->get();
        $top_profile = User::where('role', 3)->inRandomOrder()->limit(4)->get();
        $new_profile = User::where('role', 3)->latest()->limit(12)->get();
        return view('profile_search_result', compact('wedding_products', 'blogs', 'marriage_profile', 'top_profile', 'new_profile', 'search_results', 'gender', 'minimum_age', 'maximum_age', 'religion'));
    }

    function profile($id){
        $single_profile = User::where('id', $id)->firstOrFail();
        $profile_photos = ProfilePhoto::where('user_id', $single_profile->user_id)->get();
        $couch_category = Category::where('name', 'wedding couch')->first()->id;
        $wedding_products = Product::where('category_id', '!=', $couch_category)->inRandomOrder()->limit(80)->get();
        $last_blog = Blog::orderBy('id', 'desc')->first();
        $blogs = Blog::inRandomOrder()->limit(3)->get();
        $top_profile = User::where('role', 3)->inRandomOrder()->limit(4)->get();
        $matched_profile = User::where('role', 3)->inRandomOrder()->limit(4)->get();
        return view('profile', compact('wedding_products', 'last_blog', 'blogs', 'single_profile', 'profile_photos', 'top_profile', 'matched_profile'));
    }

    function shop(){
        $categories = Category::latest()->limit(11)->get();
        $latest_products = Product::latest()->limit(20)->get();
        $new_products = Product::latest()->limit(4)->get();
        $products = Product::inRandomOrder()->limit(80)->get();
        return view('shop', compact('categories', 'latest_products', 'products', 'new_products'));
    }

    function categorywiseshop($id){
        $categoryproducts = Product::where('category_id', $id)->get();
        $trending_products = Product::latest()->limit(4)->get();
        return view('category_wise_product', compact('categoryproducts', 'trending_products'));
    }

    function productdetails(Request $request,$id){
        // echo $request->first();
        $categories = Category::latest()->limit(11)->get();
        $latest_products = Product::latest()->limit(40)->get();
        $products = Product::inRandomOrder()->limit(80)->get();
        $singleproduct = Product::where('id',$id)->firstOrFail();
        $related_products = Product::where('category_id', $singleproduct->category_id)->where('id', '!=', $singleproduct->id)->get();
        $multipleimage = MultipleImage::where('product_id',$id)->get();
        return view('product_details', compact('categories', 'latest_products', 'products', 'singleproduct', 'multipleimage', 'related_products'));
    }

    function productsearch(Request $request){
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        $search_results = Product::where('name', 'like', "%$query%")
                                ->orwhere('short_description', 'like', "%$query%")
                                ->orwhere('sell_price', 'like', "%$query%")
                                ->get();
        $trending_products = Product::latest()->limit(40)->get();
        return view('product_search', compact('trending_products', 'search_results', 'query'));
    }

    function blogdetails($slug){
        $blog_categories = BlogCategory::inRandomOrder()->limit(6)->get();
        $blog_details = Blog::where('slug', $slug)->firstOrFail();
        $blogs = Blog::inRandomOrder()->limit(4)->get();
        $latest_blog = Blog::latest()->limit(4)->get();
        return view('blog_details', compact('blogs', 'blog_details', 'blog_categories', 'blog_categories', 'latest_blog'));
    }

    function cart(){
        return view('cart');
    }

    function about(){
        return view('about_us');
    }

    function contact(){
        return view('contact_us');
    }

    function service(){
        return view('service');
    }

    function service_booking(){
        return view('service_booking');
    }

    function booking_request(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'service_date' => 'required',
            'service' => 'required',
            'message' => 'required',
        ]);
        ServiceRequest::create($request->all() + [
            'user_id' => Auth::user()->id ?? NULL,
            'status' => 1,
        ]);
        Notify::success('Service Request Submited, Updates will be notified to your email.', 'Success');
        return back();
    }

    function harmony_match_making(){
        return view('harmony_match_making');
    }

    function organizing_events(){
        return view('organizing_events');
    }

    function logistics(){
        return view('logistics');
    }

    function contactmsg(Request $request){
        $request->validate([
            'name' => 'required|min:2',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        ContactFormSubmit::create($request->all());
        Notify::success('Message successfully Submited', 'Success');
        return back();
    }

    function checkout(){
        if (!Auth::user()) {
            Notify::error('Login first !', 'error');
            return redirect()->route('login');
        }

        $data['countb']  = Billing::where('user_id', Auth::user()->id)->count();
        $data['billing'] = Billing::where('user_id', Auth::user()->id)->first();
      

        return view('checkout',$data);
    }



}
