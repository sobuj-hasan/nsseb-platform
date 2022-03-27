<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{


    
    public function logout()
    {
        Auth::logout();

        $notification = array(
            'message' => 'Logout!',
            'alert-type' => 'success'
        );

        return redirect()->route('login')->with($notification);
    }
}
