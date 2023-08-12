<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Commentcontroller;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user') ->group(function(){
    Route::middleware('auth', 'active')->group(function(){
        Route::get('profile/{id}', [UserController::class, 'index'])->name('profile');
        Route::get('blogs/create',[BlogController::class, 'create']) -> name('blog.create');
        Route::post('blogs',[BlogController::class, 'store']) -> name('blogs.store');
        Route::get('blogs/{blog}/edit',[BlogController::class, 'edit'])-> name('blog.edit');
        Route::put('blogs/{blog}',[BlogController::class, 'update']) -> name('blog.update');
        Route::put('blogs/{blog}/like',[BlogController::class, 'like']) -> name('blogs.like');
        Route::delete('blogs/{blog}',[BlogController::class, 'delete']) -> name('blogs.delete');
        Route::resource('blogs/{blog}/comments', Commentcontroller::class) ->only(['index', 'store']);

        Route::get('exite', [UserController::class, 'logout'])->name('logout');
    });
    Route::get('blogs',[BlogController::class, 'index']) -> name('blogs');
    Route::get('blogs/{blog}',[BlogController::class, 'show']) -> name('blogs.show');

    Route::get('donates', DonateController::class)->name('donates');
});