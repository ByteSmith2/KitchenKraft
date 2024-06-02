<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $products = Product::all();
        return view("home", compact("products"));
    }
}
