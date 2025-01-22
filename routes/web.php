<?php

use App\Modules\site\Http\Controllers\ProductController;
use App\Modules\site\Http\Controllers\AuthController;
use App\Modules\site\Http\Controllers\HomeController;
use App\Modules\site\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

// Site routes
Route::get('product/{product}/purchase',  [ProductController::class, 'purchase'])->name('site.product.purchase');
Route::get('show/product/{product}',  [ProductController::class, 'index'])->name('site.show.product');
Route::get('register', [AuthController::class, 'register'])->name('site.register');
Route::get('my-sales',  [SaleController::class, 'mySales'])->name('site.mySales');
Route::get('logout',  [AuthController::class, 'logout'])->name('site.logout');
Route::get('login', [AuthController::class, 'login'])->name('site.login');
Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::post('authenticate', [AuthController::class, 'authenticate'])->name('site.authenticate');
Route::post('store',  [AuthController::class, 'store'])->name('site.store.user');
Route::resource('sales',  SaleController::class);

// Admin routes
Route::prefix('admin')->group(function () {
    Route::post('login/auth', [LoginController::class, 'login'])->name('login.auth');
    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    //
})

