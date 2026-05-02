<?php

use App\Http\Controllers\CheckoutSuccessController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('stripe/success', [CheckoutSuccessController::class, 'handle'])
    ->middleware(['auth'])
    ->name('stripe.success');
