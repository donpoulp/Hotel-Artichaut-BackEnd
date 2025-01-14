<?php

use App\Http\Controllers\website\bedroomController;
use App\Http\Controllers\website\footerController;
use App\Http\Controllers\website\headerController;
use App\Http\Controllers\website\userController;
use Illuminate\Support\Facades\Route;



//ROUTE API USERS*******************************************************************************************************
Route::controller(UserController::class)->group(function () {

    Route::get('/user', [UserController::class, 'allUsers']);
    Route::get('/user/{id}', [UserController::class, 'UserShowid']);
    Route::post('/user', [UserController::class, 'PostUser']);
    Route::put('/user/{id}', [UserController::class, 'UpdateUser']);
    Route::delete('/user/{id}', [UserController::class, 'DeleteUser']);
});

//ROUTE API BEDROOM*****************************************************************************************************
Route::controller(bedroomController::class)->group(function () {

    Route::get('/bedroom', [bedroomController::class, 'allBedroom']);
    Route::get('/bedroom/{id}', [bedroomController::class, 'bedroomShowid']);
    Route::post('/bedroom', [bedroomController::class, 'PostBedroom']);
    Route::put('/bedroom/{id}', [bedroomController::class, 'UpdateBedroom']);
    Route::delete('/bedroom/{id}', [bedroomController::class, 'DeleteBedroom']);
});
//ROUTE API HEADER******************************************************************************************************
Route::controller(headerController::class)->group(function () {

    Route::get('/header', [headerController::class, 'allHeader']);
    Route::get('/header/{id}', [headerController::class, 'headerShowid']);
    Route::post('/header', [headerController::class, 'PostHeader']);
    Route::put('/header/{id}', [headerController::class, 'headerUpdate']);
    Route::delete('/header/{id}', [headerController::class, 'DeleteHeader']);
});
//ROUTE API FOOTER******************************************************************************************************
Route::controller(footerController::class)->group(function () {
    Route::get('/footer', [footerController::class, 'allFooter']);
    Route::get('/footer/{id}', [footerController::class, 'footerShowid']);
    Route::post('/footer', [footerController::class, 'PostFooter']);
    Route::put('/footer/{id}', [footerController::class, 'footerUpdate']);
    Route::delete('/footer/{id}', [footerController::class, 'DeleteFooter']);
});
