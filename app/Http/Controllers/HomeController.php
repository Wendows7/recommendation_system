<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('index',[
            "title" => "Recommendation System",
            "products" => Product::latest()->paginate(3)
        ]);
    }
}
