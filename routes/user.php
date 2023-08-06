<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\commentcontroller;
use App\Http\Controllers\DonateController;
use Illuminate\Support\Facades\Route;

Route::prefix('user') ->middleware('active') -> group(function(){
    Route::get('blogs',[BlogController::class, 'index']) -> name('blogs');
    Route::get('blogs/create',[BlogController::class, 'create']) -> name('blog.create');
    Route::post('blogs',[BlogController::class, 'store']) -> name('blogs.store');
    Route::get('blogs/{blog}',[BlogController::class, 'show']) -> name('blogs.show');
    Route::get('blogs/{blog}/edit',[BlogController::class, 'edit']) -> name('blog.edit');
    Route::put('blogs/{blog}',[BlogController::class, 'update']) -> name('blog.update');
    Route::put('blogs/{blog}/like',[BlogController::class, 'like']) -> name('blogs.like');
    Route::delete('blogs/{blog}',[BlogController::class, 'delete']) -> name('blogs.delete');
    Route::resource('blogs/{blog}/comments', commentcontroller::class) ->only(['index', 'store']);

    Route::get('donates', DonateController::class)->name('donates');
});