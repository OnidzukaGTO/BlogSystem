<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\commentcontroller;
use Illuminate\Support\Facades\Route;

Route::prefix('admin') ->middleware('admin', 'token') -> group(function(){
    Route::get('blogs',[BlogController::class, 'index']) -> name('admin.blogs');
    Route::get('blogs/create',[BlogController::class, 'create']) -> name('admin.blogs.create');
    Route::post('blogs',[BlogController::class, 'store']) -> name('admin.blogs.store');
    Route::get('blogs/{blog}',[BlogController::class, 'show']) -> name('admin.blogs.show');
    Route::get('blogs/{blog}/edit',[BlogController::class, 'edit']) -> name('admin.blogs.edit');
    Route::put('blogs/{blog}',[BlogController::class, 'update']) -> name('admin.blogs.update');
    Route::put('blogs/{blog}/like',[BlogController::class, 'like']) -> name('admin.blogs.like');
    Route::delete('blogs/{blog}',[BlogController::class, 'delete']) -> name('admin.blogs.delete');
    Route::resource('blogs/{blog}/comments', commentcontroller::class) ->only(['index', 'store']);
});