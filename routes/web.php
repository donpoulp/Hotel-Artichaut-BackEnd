<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::get('api/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

Route::get('/inscription',function (){

    return view('inscriptionMail');

});
