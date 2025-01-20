<?php

use App\Modules\site\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.home.index');
});

Route::get('register', [AuthController::class, 'register'])->name('site.register');
Route::get('login', [AuthController::class, 'login'])->name('site.login');

Route::post('authenticate', [AuthController::class, 'authenticate'])->name('site.authenticate');
Route::post('store',  [AuthController::class, 'store'])->name('site.store.user');

