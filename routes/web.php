<?php

use App\Http\Controllers\website\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

