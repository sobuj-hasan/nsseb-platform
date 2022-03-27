<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'gender',
        'phone',
        'birth_date',
        'age',
        'religion',
        'mother_tongue',
        'country',
        'merital_status',
        'blood',
        'annual_income',
        'your_about',
        'education',
        'height',
        'weight',
        'skin_tune',
        'eay_color',
        'hear_color',
        'body_type',
        'family_type',
        'family_status',
        'occupation',
        'disability',
        'hobby',
        'habits',
        'per_country',
        'per_state',
        'per_city',
        'per_road',
        'per_house',
        'present_country',
        'peresent_state',
        'present_city',
        'present_road',
        'present_house',
    ];

    protected $with = ['user', 'profile_photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile_photo()
    {
        return $this->belongsTo(ProfilePhoto::class);
    }

}
