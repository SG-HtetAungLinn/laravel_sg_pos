<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $guarded = [];
    public function discountProduct()
    {
        return $this->hasMany(Discount::class, 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'discount_products', 'discount_id', 'product_id');
    }
}
