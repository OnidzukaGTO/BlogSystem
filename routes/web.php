<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index') -> name('home');

Route::redirect('home','/'); //перенаправление 

    Route::get('register', [RegisterController::class, 'index']) -> name('register');
    Route::post('register', [RegisterController::class, 'store']) -> name('register.store'); 
    
    Route::get('login', [LoginController::class, 'index']) -> name('login');
    Route::post('login', [LoginController::class, 'store']) -> name('login.store');   
      
Route::get('test', [TestController::class, 'index'])->name('test');
Route::post('test', [TestController::class, 'store'])->name('test.store');