<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::get('api/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

Route::get('/inscription/{id}',[MailController::class,'sendMail']);

Route::get('/checkout/{id}', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'afterPayment'])->name('credit-card');

