<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutItem extends Model
{
    protected $fillable = [
        'checkout_id',
        'food_id',
        'quantity',
        'price',
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
} 