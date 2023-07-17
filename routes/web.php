<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ProductController;
use App\Models\Member;
use App\Models\Parameter;
use RealRashid\SweetAlert\Facades\Alert;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function() {
    return view('index',[
        'title' => 'Login'
    ]);
})->middleware('guest');

// router for login & logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// router for dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// router for profile
Route::get('/dashboard/profile', [DashboardProfileController::class, 'index'])->middleware('auth');
Route::patch('/dashboard/profile/update', [DashboardProfileController::class, 'update'])->middleware('auth');

// router for user
Route::resource('/dashboard/user', DashboardUserController::class)->middleware('auth');

// router for products
Route::resource('/dashboard/products', ProductController::class)->middleware('auth');

// router for members
Route::resource('/dashboard/members', MemberController::class)->middleware('auth');

// router for parameters
Route::resource('/dashboard/parameters', ParameterController::class)->middleware('auth');

// router for user interface
// Route::get('/dashboard/profile', [DashboardProfileController::class, 'index'])->middleware('auth');




