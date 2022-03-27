<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $with = ['order_details'];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class,'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }




}
