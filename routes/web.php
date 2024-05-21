<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;

// Home Controller Start
Route::get('/', [HomeController::class,'index']);
Route::get('/home-2', [HomeController::class,'home2']);
Route::get('/home-3', [HomeController::class,'home3']);
Route::get('/home-4', [HomeController::class,'home4']);
Route::get('/home-5', [HomeController::class,'home5']);
// Home Controller End

// Portfolio Controller Start
Route::get('/portfolio', [PortfolioController::class,'portfolio']);
Route::get('/portfolio-details', [PortfolioController::class,'portfolio_details']);
// Portfolio Controller End

// Post Controller Start
Route::get('/blog', [PostController::class,'index']);
Route::get('/posts', [PostController::class,'post']);
Route::get('/delete', [PostController::class,'destroy']);
Route::get('/insert-data', [PostController::class,'edit']);
Route::get('/truncate', [PostController::class,'update']);
// Post Controller End

//Blog Controller Start
Route::get('/blog', [BlogController::class,'blog']);
Route::get('/blog-2', [BlogController::class,'blog2']);
Route::get('/blog-details', [BlogController::class,'blog_details']);
// Blog Controller End

// About Controller
Route::get('/about', [AboutController::class,'about']);
Route::get('/about-2', [AboutController::class,'about2']);
// About Controller End

// Service Controller Starts
Route::get('/contact', [ServiceController::class,'contact']);
Route::get('/faq', [ServiceController::class,'faq']);
Route::get('/price', [ServiceController::class,'price']);
Route::get('/process', [ServiceController::class,'process']);
Route::get('/service-details', [ServiceController::class,'service_details']);
Route::get('/team', [ServiceController::class,'team']);
// Service Controller End

Route::get('/article/{slug}',[BlogController::class,'single'])->name('single-post');






