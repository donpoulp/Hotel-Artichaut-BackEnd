<?php

use App\Http\Controllers\website\bedroomController;
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
    Route::get('/bedroom/{id}', [bedroomController::class, 'BedroomShowid']);
    Route::post('/bedroom', [bedroomController::class, 'PostBedroom']);
    Route::put('/bedroom/{id}', [bedroomController::class, 'UpdateBedroom']);
    Route::delete('/bedroom/{id}', [bedroomController::class, 'DeleteBedroom']);
});
