<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'user_id',
        'order_type',
        'name',
        'phone',
        'email',
        'address',
        'note',
        'payment_method',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Food::class, 'product_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(\App\Models\CheckoutItem::class, 'checkout_id');
    }
}
