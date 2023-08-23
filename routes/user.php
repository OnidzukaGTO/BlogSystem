<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user') ->group(function(){
    Route::middleware('auth', 'active')->group(function(){
        Route::get('blogs/create',[BlogController::class, 'create']) -> name('blog.create');
        Route::post('blogs',[BlogController::class, 'store']) -> name('blogs.store');
        Route::get('blogs/{blog}/edit',[BlogController::class, 'edit'])-> name('blog.edit');
        Route::put('blogs/{blog}',[BlogController::class, 'update']) -> name('blog.update');
        Route::delete('blogs/{blog}/delete',[BlogController::class, 'delete']) -> name('blog.delete');

        Route::get('profile/{id}', [UserController::class, 'index'])->name('profile');
        Route::get('profile/{id}/liked', [UserController::class, 'liked'])->name('profile.liked');
        Route::delete('profile/{user}/delete',[UserController::class, 'delete']) -> name('user.delete');
        Route::post('blogs/{blogId}/like',[LikeController::class, 'like']) -> name('blogs.like');

        Route::post('blogs/{blog}', [CommentController::class, 'store'])->name('comment');
        Route::delete('blogs/{blog}/{comment}/delete', [CommentController::class, 'delete'])->name('comment.delete');
        //Route::resource('blogs/{blog}/comments', Commentcontroller::class) ->only(['index', 'store']);

        Route::get('exite', [UserController::class, 'logout'])->name('logout');
    });
    Route::get('blogs',[BlogController::class, 'index']) -> name('blogs');
    Route::get('blogs/{blog}',[BlogController::class, 'show']) -> name('blogs.show');

    Route::get('donates', DonateController::class)->name('donates');
});