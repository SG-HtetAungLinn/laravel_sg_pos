<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $guarded = [];
    protected $appends = ['image'];
    public function getThumbPath($img)
    {
        return asset('storage/product/thumb/' . $img);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_products');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function image()
    {
        return asset('storage/product/thumb/' . $this->thumb_img);
    }
    public function getImageAttribute()
    {
        return asset('storage/product/thumb/' . $this->thumb_img);
    }
}
