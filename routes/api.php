<?php

use App\Http\Controllers\website\bedroomController;
use App\Http\Controllers\website\bedroomTypeController;
use App\Http\Controllers\website\footerController;
use App\Http\Controllers\website\headerController;
use App\Http\Controllers\website\heroBtnController;
use App\Http\Controllers\website\heroController;
use App\Http\Controllers\website\hotelController;
use App\Http\Controllers\website\newsController;
use App\Http\Controllers\website\pictureController;
use App\Http\Controllers\website\reservationController;
use App\Http\Controllers\website\servicesController;
use App\Http\Controllers\website\strongestController;
use App\Http\Controllers\website\userController;
use App\Http\Controllers\website\strongestSectionController;
use Illuminate\Support\Facades\Route;



//ROUTE API USERS*******************************************************************************************************
Route::controller(userController::class)->group(function () {

    Route::get('/user', [userController::class, 'allUsers']);
    Route::get('/user/{id}', [userController::class, 'UserShowid']);
    Route::post('/user', [userController::class, 'PostUser']);
    Route::put('/user/{id}', [userController::class, 'UpdateUser']);
    Route::delete('/user/{id}', [userController::class, 'DeleteUser']);
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
Route::controller(heroController::class)->group(function () {
    Route::get('/hero', [heroController::class, 'allHero']);
    Route::get('/hero/{id}', [heroController::class, 'heroShowid']);
    Route::post('/hero', [heroController::class, 'PostHero']);
    Route::put('/hero/{id}', [heroController::class, 'heroUpdate']);
    Route::delete('/hero/{id}', [heroController::class, 'DeleteHero']);
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
//ROUTE NEWS************************************************************************************************************
Route::controller(newsController::class)->group(function () {
    Route::get('/news', [newsController::class, 'allNews']);
    Route::get('/news/{id}', [newsController::class, 'newsShowid']);
    Route::post('/news', [newsController::class, 'PostNews']);
    Route::put('/news/{id}', [newsController::class, 'newsUpdate']);
    Route::delete('/news/{id}', [newsController::class, 'DeleteNews']);
});
//ROUTE RESERVATION*****************************************************************************************************
Route::controller(reservationController::class)->group(function () {
    Route::get('/reservation', [reservationController::class, 'allReservation']);
    Route::get('/reservation/{id}', [reservationController::class, 'ReservationShowid']);
    Route::post('/reservation', [reservationController::class, 'PostReservation']);
    Route::put('/reservation/{id}', [reservationController::class, 'UpdateReservation']);
    Route::delete('/reservation/{id}', [reservationController::class, 'DeleteReservation']);
});
//ROUTE SERVICES********************************************************************************************************
Route::controller(servicesController::class)->group(function () {
    Route::get('/services', [servicesController::class, 'allServices']);
    Route::get('/services/{id}', [servicesController::class, 'ServicesShowid']);
    Route::post('/services', [servicesController::class, 'PostServices']);
    Route::put('/services/{id}', [servicesController::class, 'UpdateServices']);
    Route::delete('/services/{id}', [servicesController::class, 'DeleteServices']);
});
//ROUTE STRONGEST_SECTION*******************************************************************************************************
Route::controller(strongestSectionController::class)->group(function () {
    Route::get('/strongest_section', [strongestSectionController::class, 'allStrongestSection']);
    Route::get('/strongest_section/{id}', [strongestSectionController::class, 'StrongestSectionShowid']);
    Route::post('/strongest_section', [strongestSectionController::class, 'PostStrongestSection']);
    Route::put('/strongest_section/{id}', [strongestSectionController::class, 'UpdateStrongestSection']);
    Route::delete('/strongest_section/{id}', [strongestSectionController::class, 'DeleteStrongestSection']);
});
//ROUTE STRONGEST*******************************************************************************************************
Route::controller(strongestController::class)->group(function () {
    Route::get('/strongest', [strongestController::class, 'allStrongest']);
    Route::get('/strongest/{id}', [strongestController::class, 'StrongestShowid']);
    Route::post('/strongest', [strongestController::class, 'PostStrongest']);
    Route::put('/strongest/{id}', [strongestController::class, 'UpdateStrongest']);
    Route::delete('/strongest/{id}', [strongestController::class, 'DeleteStrongest']);
});
//ROUTE PICTURE*********************************************************************************************************
Route::controller(pictureController::class)->group(function (){
    Route::get('/picture', [pictureController::class, 'allpicture']);
});
