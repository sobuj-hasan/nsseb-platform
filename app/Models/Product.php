<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'name',
        // 'slug',
        'image',
        'sell_price',
        'price',
        'stock',
        'short_description',
        'long_description',
        'user_id',
        'status',
    ];

    protected $with = ['category', 'user', 'brand', 'multipleimage'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function multipleimage()
    {
        return $this->belongsTo(MultipleImage::class);
    }



}
