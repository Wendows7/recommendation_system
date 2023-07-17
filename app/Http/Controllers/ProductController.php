<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        return view('products',[
        "title" => "Recommendation System",
        "products" => Product::latest()->paginate(6)
        ]);
    }
}
