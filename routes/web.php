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
use App\Http\Controllers\LoginController;

// // Home Controller Start
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/home-2', [HomeController::class,'home2']);
// Route::get('/home-3', [HomeController::class,'home3']);
// Route::get('/home-4', [HomeController::class,'home4']);
// Route::get('/home-5', [HomeController::class,'home5']);
// // Home Controller End

// // Portfolio Controller Start
// Route::get('/portfolio', [PortfolioController::class,'portfolio']);
// Route::get('/portfolio-details', [PortfolioController::class,'portfolio_details']);
// // Portfolio Controller End

// // Post Controller Start
// // Route::get('/blog', [PostController::class,'index']);
Route::group(['prefix' =>'admin','middleware' => 'auth'], function(){

//     Route::get('posts', [PostController::class,'post'])->name('admin-posts');
//     Route::post('post/store',[PostController::class,'store'])->name('admin-create-store');
    // Route::get('post/create', [PostController::class,'create'])->name('admin-create-post');
//     Route::get('post/edit/{post}', [PostController::class,'edit'])->name('admin-edit-post');
//     Route::put('post/update/{post}', [PostController::class,'update'])->name('admin-update-post');
//     Route::delete('post/delete/{post}', [PostController::class, 'delete'])->name('admin-post-delete');

    Route::resource('/posts',PostController::class);

});
// // Post Controller End

// //Blog Controller Start
Route::get('/blog', [BlogController::class,'index'])->name('blog');
// Route::get('/blog-2', [BlogController::class,'blog2']);
// Route::get('/blog-details', [BlogController::class,'blog_details']);
// Route::get('/article/{slug}',[BlogController::class,'single'])->name('single-post');
// // Blog Controller End

// // About Controller
// Route::get('/about', [AboutController::class,'about']);
// Route::get('/about-2', [AboutController::class,'about2']);
// // About Controller End

// // Service Controller Starts
// Route::get('/contact', [ServiceController::class,'contact']);
// Route::get('/faq', [ServiceController::class,'faq']);
// Route::get('/price', [ServiceController::class,'price']);
// Route::get('/process', [ServiceController::class,'process']);
// Route::get('/service-details', [ServiceController::class,'service_details']);
// Route::get('/team', [ServiceController::class,'team']);
// // Service Controller End

// // Login Controller Starts
Route::get('/register', [LoginController::class,'register'])->name('register')->middleware('guest');
Route::post('/register', [LoginController::class,'registerPost'])->name('registration');

Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('login',[LoginController::class,'loginPost'])->name('loginProcess');

Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard')->middleware('auth');

// Route::get('/search-post', function (){
//     return view('admin.search-post');
// });
Route::get('logout',[LoginController::class,'signout'])->name('logout')->middleware('auth');
// // Login Controller End


// Route::get('/upload-image', function(){
//     return view('upload-image');
// });
// Route::post('/upload-image', function(Request $request){

//     $image = $request->file("thumbnail");

//     $image_name = $image->hashName();

//     $image->storeAs('/public/image', $image_name);

//     return 'Image upload successfully done!!';
// })->name('upload-image');
