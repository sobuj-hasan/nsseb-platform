<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Idemonbd\Notify\Facades\Notify;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'gender' => ['required', 'string'],
            'age' => ['required', 'integer'],
            'nationality' => ['required', 'string'],
            'education' => ['required', 'string'],
            'height' => ['required', 'string'],
            'weight' => ['required', 'integer'],
            'social_status' => ['required', 'string'],
            'children' => ['required', 'string'],
            'tribe' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'workplace' => ['required', 'string'],
            'salary' => ['required', 'string'],
            'living_place' => ['required', 'string'],
            'attributes_trait' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'education' => $request->education,
            'height' => $request->height,
            'weight' => $request->weight,
            'social_status' => $request->social_status,
            'children' => $request->children,
            'tribe' => $request->tribe,
            'occupation' => $request->occupation,
            'workplace' => $request->workplace,
            'salary' => $request->salary,
            'living_place' => $request->living_place,
            'attributes_trait' => $request->attributes_trait,
            'password' => Hash::make($request->password),
            'role' => 3,
        ]);
        
        event(new Registered($user));
        Notify::success('You Successfully registered!', 'Congrats Dear');
        
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    // Vendor Register Here 

    public function vendorRegister()
    {
        return view('auth.vendor-register');
    }


    public function vendorStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'store_name' => ['required', 'string', 'max:255'],
            'store_address' => ['required', 'string', 'max:255'],
            'activity_type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'store_name' => $request->store_name,
            'store_address' => $request->store_address,
            'activity_type' => $request->activity_type,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        event(new Registered($user));
        Notify::success('Your Shop Successfully registered!', 'Welcome Dear');

        Auth::login($user);
        return redirect(RouteServiceProvider::VENDOR);
    }


}
