<?php

use App\Http\Controllers\website\servicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

