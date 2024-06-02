<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    // Định nghĩa quan hệ với model Cart
    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }
}
