<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;

Route::get('/home', function () {
    return view('index');
})->name('home');

Route::get('/login',[UserController::class, 'loginpage'])->name('user.login');

Route::get('/signup',[UserController::class, 'registerpage'])->name('user.register');

Route::post('registersave',[UserController::class, 'registersave'])->name('user.registersave');

Route::post('loginsave',[UserController::class, 'login'])->name('user.loginsave');

Route::post('logout',[UserController::class, 'logout'])->name('user.logout');