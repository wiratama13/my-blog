<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\http\Controllers\DashboardPostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "home",
        "active" => "home",
        "nama" => "wiratama",
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "active" => "about",
        "nama" => "wiratama",
        "email" => "wira@mail.com"
    ]);
});

Route::get('/posts',[PostController::class,'index']);

Route::get('posts/{post:slug}', [PostController::class,'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// di url
// bisa dihapus
Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'title' => "Post by Category: $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author') // fix problem query banyak diload(N+1)
    ]);
});

// author = alias
// bisa dihapus
Route::get('authors/{author:username}', function(User $author)  {
    return view('posts',[
        'title' => "Author by: $author->name",
        'active' => "posts",
        'posts' => $author->posts->load('category', 'author')
    ]);
});

Route::get('/login', [loginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [loginController::class,'store']);
Route::post('/logout', [loginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');

Route::post('/register', [RegisterController::class,'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
