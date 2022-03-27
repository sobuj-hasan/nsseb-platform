<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Models\UserForm;
use App\Models\Wishlist;
use App\Models\ProfilePhoto;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Validation\Validator;

class UserProfileController extends Controller
{
    public function accountinfo(){
        $account_info = UserForm::where('user_id', Auth::id())->first();
        return view('dashboard.account_info', compact('account_info'));
    }

    public function accountphotos(){
        $account_info = UserForm::where('user_id', Auth::id())->first();
        $photos = ProfilePhoto::where('user_id', Auth::id())->get();
        return view('dashboard.account_photo', compact('account_info', 'photos'));
    }

    public function photoupload(Request $request){
        // return $request->all();

        $request->validate([
            'image' => 'required|max:2000',
        ]);

        $profile_photos = ProfilePhoto::create([
            'user_id' => Auth::id()
        ]);

        if ($request->hasFile('image')) {
            $photo_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('nsseb_assets/media/images/profile_img/'), $photo_name);
            $profile_photos->image = $photo_name;
        }

        $profile_photos->save();
        Notify::success('Your Photo Uploaded', 'Success');
        return back();
    }

    public function mywishlist(){
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('dashboard.mywishlist', compact('wishlists'));
    }





}
