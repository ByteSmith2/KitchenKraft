<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Định nghĩa quan hệ với model Product
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    // Định nghĩa quan hệ với model User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
