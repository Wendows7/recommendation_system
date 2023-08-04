<?php

use App\Models\Member;
use App\Models\Parameter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardRatingsController;
use App\Http\Controllers\DashboardRecommendationProductController;
use App\Http\Controllers\DashboardUserProduct;
use App\Http\Controllers\DashboardUserProductController;
use App\Http\Controllers\DashboardUserRatingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\RegisterController;

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

// router for user interface
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/ratings', [RatingsController::class, 'index']);
Route::get('ratings/{id}', [RatingsController::class, 'RecommendProducts']);

// router for register, login & logout admin
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register/create', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// router for dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// router for profile
Route::get('/dashboard/profile', [DashboardProfileController::class, 'index'])->middleware('auth');
Route::patch('/dashboard/profile/update', [DashboardProfileController::class, 'update'])->middleware('auth');

// router for user
Route::resource('/user', DashboardUserController::class)->middleware('admin');

// router for products
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('admin');

// router for parameters
Route::resource('/dashboard/parameters', ParameterController::class)->middleware('admin');

// router for ratings
Route::resource('/dashboard/ratings', DashboardRatingsController::class)->middleware('admin');

// router for dashboard user
Route::get("/dashboard/product_user", [DashboardUserProductController::class, 'index'])->middleware("auth");

// router for ratings user
Route::resource('/dashboard/ratings_user', DashboardUserRatingsController::class)->middleware('auth');

// router for recommendation index
Route::get("/dashboard/recommend_product", [DashboardRecommendationProductController::class, 'index'])->middleware("auth");
// router for recommendation by parameter
Route::get("/dashboard/recommend_product/{id}", [DashboardRecommendationProductController::class, 'Recommendation'])->middleware("auth");



