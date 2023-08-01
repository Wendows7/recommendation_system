<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;

class DashboardUserProductController extends Controller
{
    public function index(Dashboard $dashboard)
    {
        $title = 'Delete Product!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboard.user_product.index',[
            'title' => 'Dashboard | Products',
            'selisihmenit' => $dashboard->showMinute(),
            'products' => Product::latest()->paginate(6),
            'parameters' => Parameter::all(),
            'ratings' => Rating::all()
      
            
        ]);
    }
}
