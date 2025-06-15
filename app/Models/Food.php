<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'category_id',
        'is_popular',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
