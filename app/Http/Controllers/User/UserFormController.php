<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserForm;
use Illuminate\Support\Facades\Auth;

class UserFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile_create_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'full_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'phone' => ['required', 'string'],
            'birth_date' => ['required', 'string'],
            'age' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'mother_tongue' => ['required', 'string'],
            'country' => ['required', 'string'],
            'merital_status' => ['required', 'string'],
            'blood' => ['required', 'string'],
            'annual_income' => ['required', 'string'],
            'your_about' => ['required', 'string'],
            'education' => ['required', 'string'],
            'height' => ['required', 'string'],
            'weight' => ['required', 'string'],
            'skin_tune' => ['required', 'string'],
            'eay_color' => ['required', 'string'],
            'hear_color' => ['required', 'string'],
            'body_type' => ['required', 'string'],
            'family_type' => ['required', 'string'],
            'family_status' => ['required', 'string'],
            'occupation' => [''],
            'disability' => [''],
            'hobby' => [''],
            'habits' => [''],
            'per_country' => ['required', 'string'],
            'per_state' => ['required', 'string'],
            'per_city' => ['required', 'string'],
            'per_road' => ['required', 'string'],
            'per_house' => ['required', 'string'],
            'present_country' => ['required', 'string'],
            'peresent_state' => ['required', 'string'],
            'present_city' => ['required', 'string'],
            'present_road' => ['required', 'string'],
            'present_house' => ['required', 'string'],
        ]);
        UserForm::create($request->except('_token'));
        Notify::success('Profile created Successcully ! Now Add your photos', 'Success');
        return redirect()->route('account.info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = UserForm::where('user_id', $id)->first();
        return view('dashboard.profile_edit_form', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'full_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'phone' => ['required', 'string'],
            'birth_date' => ['required', 'string'],
            'age' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'mother_tongue' => ['required', 'string'],
            'country' => ['required', 'string'],
            'merital_status' => ['required', 'string'],
            'blood' => ['required', 'string'],
            'annual_income' => ['required', 'string'],
            'your_about' => ['required', 'string'],
            'education' => ['required', 'string'],
            'height' => ['required', 'string'],
            'weight' => ['required', 'string'],
            'skin_tune' => ['required', 'string'],
            'eay_color' => ['required', 'string'],
            'hear_color' => ['required', 'string'],
            'body_type' => ['required', 'string'],
            'family_type' => ['required', 'string'],
            'family_status' => ['required', 'string'],
            'occupation' => [''],
            'disability' => [''],
            'hobby' => [''],
            'habits' => [''],
            'per_country' => ['required', 'string'],
            'per_state' => ['required', 'string'],
            'per_city' => ['required', 'string'],
            'per_road' => ['required', 'string'],
            'per_house' => ['required', 'string'],
            'present_country' => ['required', 'string'],
            'peresent_state' => ['required', 'string'],
            'present_city' => ['required', 'string'],
            'present_road' => ['required', 'string'],
            'present_house' => ['required', 'string'],
        ]);

        $userform = UserForm::find($id);
        $userform->full_name = $request->full_name;
        $userform->email = $request->email;
        $userform->gender = $request->gender;
        $userform->phone = $request->phone;
        $userform->birth_date = $request->birth_date;
        $userform->age = $request->age;
        $userform->religion = $request->religion;
        $userform->mother_tongue = $request->mother_tongue;
        $userform->country = $request->country;
        $userform->merital_status = $request->merital_status;
        $userform->blood = $request->blood;
        $userform->annual_income = $request->annual_income;
        $userform->your_about = $request->your_about;
        $userform->education = $request->education;
        $userform->height = $request->height;
        $userform->weight = $request->weight;
        $userform->skin_tune = $request->skin_tune;
        $userform->eay_color = $request->eay_color;
        $userform->hear_color = $request->hear_color;
        $userform->body_type = $request->body_type;
        $userform->body_type = $request->body_type;
        $userform->family_type = $request->family_type;
        $userform->family_status = $request->family_status;
        $userform->occupation = $request->occupation;
        $userform->disability = $request->disability;
        $userform->hobby = $request->hobby;
        $userform->habits = $request->habits;
        $userform->per_country = $request->per_country;
        $userform->per_state = $request->per_state;
        $userform->per_city = $request->per_city;
        $userform->per_road = $request->per_road;
        $userform->per_house = $request->per_house;
        $userform->present_country = $request->present_country;
        $userform->peresent_state = $request->peresent_state;
        $userform->present_city = $request->present_city;
        $userform->present_road = $request->present_road;
        $userform->present_house = $request->present_house;
        $userform->save();
        Notify::success('Marriage Profile Updated', 'Updated');
        return redirect()->route('account.info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
