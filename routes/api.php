<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\website\AboutDescriptionController;
use App\Http\Controllers\website\AboutSectionController;
use App\Http\Controllers\website\BedroomController;
use App\Http\Controllers\website\BedroomTypeController;
use App\Http\Controllers\website\DashboardStatsController;
use App\Http\Controllers\website\FooterController;
use App\Http\Controllers\website\HeaderController;
use App\Http\Controllers\website\HeroController;
use App\Http\Controllers\website\HotelController;
use App\Http\Controllers\website\IconController;
use App\Http\Controllers\website\NewsController;
use App\Http\Controllers\website\PictureController;
use App\Http\Controllers\website\ReservationController;
use App\Http\Controllers\website\ServicesController;
use App\Http\Controllers\website\StatusController;
use App\Http\Controllers\website\StrongestController;
use App\Http\Controllers\website\StrongestSectionController;
use App\Http\Controllers\website\UserController;
use App\Http\Middleware\CheckIsAdmin;
use App\Http\Middleware\CookieAuth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


//ROUTE API USERS*******************************************************************************************************
Route::controller(UserController::class)->group(function () {

    Route::get('/user', [UserController::class, 'allUsers']);
    Route::get('/user/{id}', [UserController::class, 'UserShowid']);

    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/user', [UserController::class, 'PostUser']);
        Route::put('/user/{id}', [UserController::class, 'UpdateUser']);
        Route::delete('/user/{id}', [UserController::class, 'DeleteUser']);
    });
});

//ROUTE API BEDROOM*****************************************************************************************************
Route::controller(BedroomController::class)->group(function () {
    Route::get('/bedroom', [BedroomController::class, 'allBedroom']);
    Route::get('/bedroom/{id}', [BedroomController::class, 'bedroomShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/bedroom', [BedroomController::class, 'PostBedroom']);
        Route::put('/bedroom/{id}', [BedroomController::class, 'UpdateBedroom']);
        Route::delete('/bedroom/{id}', [BedroomController::class, 'DeleteBedroom']);
    });
});

//ROUTE API HEADER******************************************************************************************************
Route::controller(HeaderController::class)->group(function () {
    Route::get('/header', [HeaderController::class, 'allHeader']);
    Route::get('/header/{id}', [HeaderController::class, 'headerShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/header', [HeaderController::class, 'PostHeader']);
        Route::put('/header/{id}', [HeaderController::class, 'headerUpdate']);
        Route::delete('/header/{id}', [HeaderController::class, 'DeleteHeader']);
    });
});

//ROUTE API FOOTER******************************************************************************************************
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer', [FooterController::class, 'allFooter']);
    Route::get('/footer/{id}', [FooterController::class, 'footerShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/footer', [FooterController::class, 'PostFooter']);
        Route::put('/footer/{id}', [FooterController::class, 'footerUpdate']);
        Route::delete('/footer/{id}', [FooterController::class, 'DeleteFooter']);
    });
});

//ROUTE API BEDROOM TYPE************************************************************************************************
Route::controller(BedroomTypeController::class)->group(function () {
    Route::get('/bedroomType', [BedroomTypeController::class, 'allBedroomType']);
    Route::get('/bedroomType/{id}', [BedroomTypeController::class, 'bedroomTypeShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/bedroomType', [BedroomTypeController::class, 'PostBedroomType']);
        Route::put('/bedroomType/{id}', [BedroomTypeController::class, 'UpdateBedroomType']);
        Route::delete('/bedroomType/{id}', [BedroomTypeController::class, 'DeleteBedroomType']);
    });
});

//ROUTE API HERO********************************************************************************************************
Route::controller(HeroController::class)->group(function () {
    Route::get('/hero', [HeroController::class, 'allHero']);
    Route::get('/hero/{id}', [HeroController::class, 'heroShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/hero', [HeroController::class, 'PostHero']);
        Route::put('/hero/{id}', [HeroController::class, 'heroUpdate']);
        Route::delete('/hero/{id}', [HeroController::class, 'DeleteHero']);
    });
});

//ROUTE HOTEL***********************************************************************************************************
Route::controller(HotelController::class)->group(function () {
    Route::get('/hotel', [HotelController::class, 'allHotel']);
    Route::get('/hotel/{id}', [HotelController::class, 'hotelShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/hotel', [HotelController::class, 'PostHotel']);
        Route::put('/hotel/{id}', [HotelController::class, 'hotelUpdate']);
        Route::delete('/hotel/{id}', [HotelController::class, 'DeleteHotel']);
    });
});

//ROUTE NEWS************************************************************************************************************
Route::controller(NewsController::class)->group(function () {
    Route::get('/news', [NewsController::class, 'allNews']);
    Route::get('/news/{id}', [NewsController::class, 'newsShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/news', [NewsController::class, 'PostNews']);
        Route::put('/news/{id}', [NewsController::class, 'newsUpdate']);
        Route::delete('/news/{id}', [NewsController::class, 'DeleteNews']);
    });
});

//ROUTE RESERVATION*****************************************************************************************************
Route::controller(ReservationController::class)->group(function () {
    Route::get('/reservation', [ReservationController::class, 'allReservation']);
    Route::get('/reservation/{id}', [ReservationController::class, 'ReservationShowid']);
    Route::get('/dates', [ReservationController::class, 'checkReservation']);
    Route::get('/reservations/user/{userId}', [ReservationController::class, 'getReservationsByUserId']);

    // route protegé par sanctum:custom ! RULE : CONNECTER
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class])->group(function () {
        Route::post('/reservation', [ReservationController::class, 'PostReservation']);
        Route::put('/reservation/{id}', [ReservationController::class, 'UpdateReservation']);
        Route::delete('/reservation/{id}', [ReservationController::class, 'DeleteReservation']);
    });

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/reservation-from-bo', [ReservationController::class, 'PostReservationFromBo']);
        Route::put('/reservation-from-bo/{id}', [ReservationController::class, 'UpdateReservationFromBo']);
    });
});

//ROUTE SERVICES********************************************************************************************************
Route::controller(ServicesController::class)->group(function () {
    Route::get('/services', [ServicesController::class, 'allServices']);
    Route::get('/services/{id}', [ServicesController::class, 'ServicesShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/services', [ServicesController::class, 'PostServices']);
        Route::put('/services/{id}', [ServicesController::class, 'UpdateServices']);
        Route::delete('/services/{id}', [ServicesController::class, 'DeleteServices']);
    });
});

//ROUTE STRONGEST_SECTION*******************************************************************************************************
Route::controller(StrongestSectionController::class)->group(function () {
    Route::get('/strongest_section', [StrongestSectionController::class, 'allStrongestSection']);
    Route::get('/strongest_section/{id}', [StrongestSectionController::class, 'StrongestSectionShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/strongest_section', [StrongestSectionController::class, 'PostStrongestSection']);
        Route::put('/strongest_section/{id}', [StrongestSectionController::class, 'UpdateStrongestSection']);
        Route::delete('/strongest_section/{id}', [StrongestSectionController::class, 'DeleteStrongestSection']);
    });
});

//ROUTE STRONGEST*******************************************************************************************************
Route::controller(StrongestController::class)->group(function () {
    Route::get('/strongest', [StrongestController::class, 'allStrongest']);
    Route::get('/strongest/{id}', [StrongestController::class, 'StrongestShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/strongest', [StrongestController::class, 'PostStrongest']);
        Route::put('/strongest/{id}', [StrongestController::class, 'UpdateStrongest']);
        Route::delete('/strongest/{id}', [StrongestController::class, 'DeleteStrongest']);
    });
});

//ROUTE PICTURE*********************************************************************************************************
Route::controller(PictureController::class)->group(function (){
    Route::get('/picture', [PictureController::class, 'allpicture']);
    Route::get('/picture/{id}', [PictureController::class, 'PictureShowid']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/picture', [PictureController::class, 'PostPicture']);
        Route::put('/picture/{id}', [PictureController::class, 'UpdatePicture']);
        Route::delete('/picture/{id}', [PictureController::class, 'DeletePicture']);
    });
});

//ROUTE STATUS**********************************************************************************************************
Route::controller(StatusController::class)->group(function () {
    Route::get('/status', [StatusController::class, 'allStatuses']);
});

//ROUTE API ABOUT*******************************************************************************************************
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', [AboutController::class, 'allAbout']);

    // route protegé par sanctum:custom ! RULE : CONNECTER + ADMIN
    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::put('/about/{id}', [AboutController::class, 'aboutUpdate']);
    });
});

//ROUTE API ABOUT_SECTION*******************************************************************************************************
Route::controller(AboutSectionController::class)->group(function () {
    Route::get('/about_section', [AboutSectionController::class, 'allAboutSection']);

    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::put('/about_section/{id}', [AboutSectionController::class, 'putAboutSection']);
    });
});

//ROUTE API ABOUT_DESCRIPTION*******************************************************************************************************
Route::controller(AboutDescriptionController::class)->group(function () {
    Route::get('/about_description', [AboutDescriptionController::class, 'allAboutDescription']);
    Route::get('/about_description/{id}', [AboutDescriptionController::class, 'getAboutDescriptionByAboutSectionId']);

    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::put('/about_description/{id}', [AboutDescriptionController::class, 'putAboutDescription']);
    });
});

//ROUTE AUTH************************************************************************************************************
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//ROUTE ICON************************************************************************************************************
Route::controller(iconController::class)->group(function () {
    Route::get('/icon', [IconController::class, 'allIcon']);
    Route::get('/icon/{id}', [IconController::class, 'iconShowid']);

    Route::middleware([EnsureFrontendRequestsAreStateful::class, CookieAuth::class, CheckIsAdmin::class])->group(function () {
        Route::post('/icon', [IconController::class, 'postIcon']);
        Route::put('/icon/{id}', [IconController::class, 'iconUpdate']);
        Route::delete('/icon/{id}', [IconController::class, 'deleteIcon']);
    });
});

Route::get('/stats/reservations', [DashboardStatsController::class, 'reservationsPerMonth']);




