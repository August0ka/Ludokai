<?php

use App\Modules\site\Http\Controllers\PagBankController;
use Illuminate\Support\Facades\Route;

//Site routes
Route::post('pagbank/checkout/webhook', [PagBankController::class, 'checkoutWebhook'])->name('pagbank.checkout.webhook');

