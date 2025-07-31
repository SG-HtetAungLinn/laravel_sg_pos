<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountProduct extends Model
{
    public function discount()
    {
        $this->belongsTo(Discount::class);
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
