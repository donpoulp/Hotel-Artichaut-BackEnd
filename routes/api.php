<?php

use App\Http\Controllers\website\bedroomController;
use App\Http\Controllers\website\bedroomTypeController;
use App\Http\Controllers\website\footerController;
use App\Http\Controllers\website\headerController;
use App\Http\Controllers\website\heroBtnController;
use App\Http\Controllers\website\hotelController;
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
//ROUTE API BEDROOM TYPE************************************************************************************************
Route::controller(bedroomTypeController::class)->group(function () {
    Route::get('/bedroomType', [bedroomTypeController::class, 'allBedroomType']);
    Route::get('/bedroomType/{id}', [bedroomTypeController::class, 'bedroomTypeShowid']);
    Route::post('/bedroomType', [bedroomTypeController::class, 'PostBedroomType']);
    Route::put('/bedroomType/{id}', [bedroomTypeController::class, 'UpdateBedroomType']);
    Route::delete('/bedroomType/{id}', [bedroomTypeController::class, 'DeleteBedroomType']);
});
//ROUTE API HERO********************************************************************************************************
Route::controller(heroBtnController::class)->group(function () {
    Route::get('/hero', [heroBtnController::class, 'allHero']);
    Route::get('/hero/{id}', [heroBtnController::class, 'heroShowid']);
    Route::post('/hero', [heroBtnController::class, 'PostHero']);
    Route::put('/hero/{id}', [heroBtnController::class, 'heroUpdate']);
    Route::delete('/hero/{id}', [heroBtnController::class, 'DeleteHero']);
});
//ROUTE HERO BTN********************************************************************************************************
Route::controller(heroBtnController::class)->group(function () {
    Route::get('/heroBtn', [heroBtnController::class, 'allHeroBtn']);
    Route::get('/heroBtn/{id}', [heroBtnController::class, 'heroBtnShowid']);
    Route::post('/heroBtn', [heroBtnController::class, 'PostHeroBtn']);
    Route::put('/heroBtn/{id}', [heroBtnController::class, 'heroBtnUpdate']);
    Route::delete('/heroBtn/{id}', [heroBtnController::class, 'DeleteHeroBtn']);
});
//ROUTE HOTEL***********************************************************************************************************
Route::controller(hotelController::class)->group(function () {
    Route::get('/hotel', [hotelController::class, 'allHotel']);
    Route::get('/hotel/{id}', [hotelController::class, 'hotelShowid']);
    Route::post('/hotel', [hotelController::class, 'PostHotel']);
    Route::put('/hotel/{id}', [hotelController::class, 'hotelUpdate']);
    Route::delete('/hotel/{id}', [hotelController::class, 'DeleteHotel']);
});
