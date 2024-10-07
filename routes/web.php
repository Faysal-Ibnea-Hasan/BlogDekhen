<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function(){
    Route::get('/login','showLoginForm')->name('login');
    Route::post('/success','login')->name('login.process');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(BlogController::class)->prefix('blog')->group(function () {
    Route::get('/', 'showBlog')->name('blog');
    Route::get('/myBlog', 'myBlog')->name('myBlog')->middleware('auth');
    Route::get('/create', 'create_blog')->name('blog.create')->middleware('auth');
    Route::post('/store', 'store')->name('blog.store')->middleware('auth');
});
