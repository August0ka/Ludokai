<?php

use App\Modules\admin\Http\Controllers\AdminAuthController;
use App\Modules\admin\Http\Controllers\AdminCategoryController;
use App\Modules\admin\Http\Controllers\AdminProductController;
use App\Modules\admin\Http\Controllers\AdminUserController;
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
    Route::post('login/auth', [AdminAuthController::class, 'login'])->name('login.auth');
    Route::post('authenticate', [AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('login', [AdminAuthController::class, 'index'])->name('admin.login');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminAuthController::class, 'index'])->name('admin.products');

    Route::resource('categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('products', AdminProductController::class)->names('admin.products');
    Route::resource('users', AdminUserController::class)->names('admin.users');
});
