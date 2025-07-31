<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = [];

    public function getImage()
    {
        return asset('storage/product/' . $this->product_id . '/' . $this->image);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
