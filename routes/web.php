<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Tag\TagController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/success', 'login')->name('login.process');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(BlogController::class)->prefix('blog')->group(function () {
    Route::get('/', 'showBlog')->name('blog');
    Route::get('/details/{id}', 'details')->name('blog.details');
    Route::middleware(['auth'])->group(function () {
        Route::get('/myBlog', 'myBlog')->name('myBlog');
        Route::get('/create', 'create_blog')->name('blog.create');
        Route::get('/edit/{id}', 'edit')->name('blog.edit');
        Route::post('/store', 'store')->name('blog.store');
        Route::put('/update', 'update')->name('blog.update');
        Route::delete('/delete/{id}', 'delete')->name('blog.delete');
        Route::post('/status', 'changeStatus')->name('blog.status.change');
    });
});
Route::controller(TagController::class)->middleware('auth')->prefix('tag')->group(function () {
    Route::post('/store', 'store')->name('tag.create');
    Route::get('/tags', 'myTags')->name('tag.myTags');
    Route::post('/status', 'changeStatus')->name('tag.status.change');
    Route::delete('/delete', 'delete')->name('tag.delete');
});
Route::controller(CategoryController::class)->middleware('auth')->prefix('category')->group(function () {
    Route::post('/store', 'store')->name('category.create');
    Route::get('/categories', 'myCategories')->name('category.myCategories');
    Route::post('/status', 'changeStatus')->name('category.status.change');
    Route::delete('/delete', 'delete')->name('category.delete');
});
