<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Models\Category;
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

// Blog
Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);
Route::get("/register",[AuthController::class,'create']);
Route::post("/register",[AuthController::class,'store']);
Route::get('login',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'post_login']);
Route::post("/logout",[AuthController::class,'logout']);    

Route::middleware("can:admin")->group(function(){
    Route::post("/blogs/{blog:slug}/comment",[CommentController::class,'store']);
    Route::post("/blogs/{blog:slug}/subscription",[BlogController::class,'subscriptionHandler']);    
    // Admin panel
    Route::get("/admin/dashboard",[AdminBlogController::class,"index"])->middleware("isAdmin");
    Route::get("/admin/blogs/create",[AdminBlogController::class,'create'])->middleware("isAdmin");
    Route::post("/admin/blogs/create",[AdminBlogController::class,'store']);
    Route::get("/admin/blogs/{blog:slug}/edit",[AdminBlogController::class,'edit']);
    Route::patch("/admin/blogs/{blog:slug}/edit",[AdminBlogController::class,'update']);
    Route::delete("/admin/blogs/{blog:slug}/delete",[AdminBlogController::class,'delete']);
});


