<?php

use Illuminate\Support\Facades\Route;

use App\http\controllers\AnnanceController;
use App\http\controllers\TournoieController;
use App\http\controllers\EtabController;
use App\http\controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* **************** Home **************** */



Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','isAdmin'])->group(function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /* **************** Annance **************** */

    Route::get('/annance', function () {
        return view('Annonce/Annance');
    });
    Route::get('annance', [AnnanceController::class, 'index']);
    Route::get('/annance/create', function () {
        return view('Annonce/Create');
    });
    Route::post('/annance/create', [AnnanceController::class,'store']);
    Route::get('/annance/{id}', function () {
        return view('Annonce/Details');
    });
    Route::get('/annance/{id}', [AnnanceController::class,'show']);
    Route::delete('/annance/{id}', [AnnanceController::class,'destroy']);
    Route::post('/annance/{id}', [AnnanceController::class,'update']);


    /* **************** Tournoie **************** */

    Route::get('/tournoie', function () {
        return view('Tournoie/Tournoie');
    });
    Route::get('tournoie', [TournoieController::class, 'index']);
    Route::get('/tournoie/create', function () {
        return view('Tournoie/Create');
    });
    Route::post('/tournoie/create', [TournoieController::class,'store']);
    Route::get('/tournoie/{id}', function () {
        return view('Tournoie/Details');
    });
    Route::get('/tournoie/{id}', [TournoieController::class,'show']);
    Route::delete('/tournoie/{id}', [TournoieController::class,'destroy']);
    Route::post('/tournoie/{id}', [TournoieController::class,'update']);


    /* **************** Etabs **************** */

    Route::get('/etablissements', function () {
        return view('Etabs/Etabs');
    });
    Route::get('etablissements', [EtabController::class, 'index']);
    Route::get('/etablissements/create', function () {
        return view('Etabs/Create');
    });
    Route::post('/etablissements/create', [EtabController::class,'store']);
    Route::delete('/etablissements/{id}', [EtabController::class,'destroy']);
    Route::get('/etablissements/{id}', function () {
        return view('Etabs/Details');
    });
    Route::get('/etablissements/{id}', [EtabController::class,'show']);
    Route::post('/etablissements/{id}', [EtabController::class,'update']);


    /* **************** Users **************** */

    Route::get('/users', function () {
        return view('Users/Users');
    });
    Route::get('users', [UserController::class, 'index']);
    Route::get('/users/create', function () {
        return view('Users/Create');
    });
    Route::get('users/create', [UserController::class, 'Cetabs']);
    Route::post('/users/create', [UserController::class,'store']);

    Route::get('/users/{id}', function () {
        return view('Users/Details');
    });
    Route::get('/users/{id}', [UserController::class,'show']);
    Route::post('/users/{id}', [UserController::class,'update']);
    Route::delete('/users/{id}', [UserController::class,'destroy']);


    /* **************** Profile **************** */

    Route::get('/profile', function () {
        return view('Profile/Profile');
    });

});