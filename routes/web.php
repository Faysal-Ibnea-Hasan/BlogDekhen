<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/success', 'login')->name('login.process');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(BlogController::class)->prefix('blog')->group(function () {
    Route::get('/', 'showBlog')->name('blog');
    Route::middleware(['auth'])->group(function () {
        Route::get('/myBlog', 'myBlog')->name('myBlog');
        Route::get('/create', 'create_blog')->name('blog.create');
        Route::get('/edit/{id}', 'edit')->name('blog.edit');
        Route::post('/store', 'store')->name('blog.store');
        Route::put('/update', 'update')->name('blog.update');
        Route::delete('/delete/{id}', 'delete')->name('blog.delete');
    });

});
