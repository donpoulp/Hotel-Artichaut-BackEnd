<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::get('api/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

Route::get('/inscription/{id}',[MailController::class,'sendMail']);

