<?php

use App\Modules\site\Http\Controllers\AuthController;
use App\Modules\site\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'register'])->name('site.register');
Route::get('logout',  [AuthController::class, 'logout'])->name('site.logout');
Route::get('login', [AuthController::class, 'login'])->name('site.login');
Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::post('authenticate', [AuthController::class, 'authenticate'])->name('site.authenticate');
Route::post('store',  [AuthController::class, 'store'])->name('site.store.user');

