<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
