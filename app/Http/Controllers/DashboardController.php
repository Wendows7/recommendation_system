<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;
use Illuminate\Support\Carbon;
use App\Models\Login;


class DashboardController extends Controller
{
    public function index(Dashboard $dashboard)
    {
        
        return view('dashboard.index',[
            'title' => 'Dashboard',
            'selisihmenit' => $dashboard->showMinute()
            
        ]);
    }

}
