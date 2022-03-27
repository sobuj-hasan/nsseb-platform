<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'store_name',
        'store_address',
        'activity_type',
        'email',
        'phone',
        'gender',
        'age',
        'nationality',
        'education',
        'height',
        'weight',
        'social_status',
        'children',
        'tribe',
        'occupation',
        'workplace',
        'salary',
        'living_place',
        'attributes_trait',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $with = ['userform'];

    public function userform()
    {
        return $this->belongsTo(UserForm::class);
    }





}
