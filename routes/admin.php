<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin') ->middleware('admin', 'token') -> group(function(){
    Route::get('home', [AdminController::class, 'index']) ->name('admin.index');
});