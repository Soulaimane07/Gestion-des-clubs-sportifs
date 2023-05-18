<?php

use Illuminate\Support\Facades\Route;

use App\http\controllers\AnnanceController;
use App\http\controllers\TournoieController;
use App\http\controllers\EtabController;
use App\http\controllers\UserController;

use App\http\controllers\TournoieAdminController;
use App\http\controllers\AnnanceAdminController;
use App\http\controllers\ParticipationsAdminController;
use App\http\controllers\SportController;
use App\http\controllers\PlayerController;
use App\http\controllers\ProfileController;
use App\http\controllers\ProfileAdminController;

use App\Http\Controllers\PDFController;
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

Auth::routes();


Route::middleware(['auth', 'notAdmin'])->group(function(){
    Route::get('/', [App\Http\Controllers\HomeAdminController::class, 'index']);


    /* **************** Annance **************** */

    Route::get('/annance', function () {
        return view('Admin/Annonce/Annance');
    });
    Route::get('annance', [AnnanceAdminController::class, 'index']);

    Route::get('/annance/{id}', function () {
        return view('Admin/Annonce/Details');
    });
    Route::get('/annance/{id}', [AnnanceAdminController::class,'show']);


    /* **************** Tournoie **************** */

    Route::get('/tournoie', function () {
        return view('Admin/Tournoie/Tournoie');
    });
    Route::get('tournoie', [TournoieAdminController::class, 'index']);

    Route::get('/tournoie/{id}', function () {
        return view('Admin/Tournoie/Details');
    });
    Route::get('/tournoie/{id}', [TournoieAdminController::class,'show']);
    Route::post('/participation', [ParticipationsAdminController::class,'store']);
    Route::post('/tournoie/Cplayer', [TournoieAdminController::class,'storeP']);
    Route::delete('/cancel/tournoie/{tournoieId}', [TournoieAdminController::class,'destroyParticipation']);
    
    Route::get('/tournoie/{tournoiId}/player/{playerId}', function () {
        return view('Admin/Tournoie/Player');
    });
    Route::get('/tournoie/{tournoiId}/player/{playerId}', [TournoieAdminController::class,'player']);
    


    Route::get('/playersCard/tournoie/{tournoieId}/etab/{etabId}', [PdfController::class, 'PlayersCardsPDF']);
    Route::get('/playersTable/tournoie/{tournoieId}/etab/{etabId}', [PdfController::class, 'PlayerstablePDF']);

    /* **************** Profile **************** */

    Route::get('/profile', function () {
        return view('Admin/Profile/Profile');
    });
});




Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /* **************** Annance **************** */

    Route::get('/annance', function () {
        return view('SAdmin/Annonce/Annance');
    });
    Route::get('/annance', [AnnanceController::class, 'index']);

    Route::get('/annance/create', function () {
        return view('SAdmin/Annonce/Create');
    });
    Route::post('/annance/create', [AnnanceController::class,'store']);
    
    Route::get('/annance/{id}', function () {
        return view('SAdmin/Annonce/Details');
    });
    Route::get('/annance/{id}', [AnnanceController::class,'show']);
    Route::delete('/annance/{id}', [AnnanceController::class,'destroy']);
    Route::post('/annance/{id}', [AnnanceController::class,'update']);


    /* **************** Tournoie **************** */

    Route::get('/tournoie', function () {
        return view('SAdmin/Tournoie/Tournoie');
    });
    Route::get('/tournoie', [TournoieController::class, 'index']);
    Route::get('/tournoie/create', function () {
        return view('SAdmin/Tournoie/Create');
    });
    Route::get('/tournoie/create', [TournoieController::class,'create']);
    Route::post('/tournoie/create', [TournoieController::class,'store']);
    Route::get('/tournoie/{id}', function () {
        return view('SAdmin/Tournoie/Details');
    });
    Route::get('/tournoie/{id}', [TournoieController::class,'show']);
    Route::delete('/tournoie/{id}', [TournoieController::class,'destroy']);
    Route::post('/tournoie/{id}', [TournoieController::class,'update']);
    
    Route::get('/tournoie/{tournoieId}/etablissement/{etabid}', function () {
        return view('SAdmin/Tournoie/Participation');
    });
    Route::get('/tournoie/{tournoieId}/etablissement/{etabid}', [TournoieController::class, 'participation']);
    Route::delete('/cancel/tournoie/{tournoieId}/etab/{etabid}', [TournoieController::class, 'deleteParticipation']);

    Route::get('/tournoie/{tournoiId}/player/{playerId}', function () {
        return view('SAdmin/Tournoie/Player');
    });
    Route::get('/tournoie/{tournoiId}/player/{playerId}', [TournoieController::class,'player']);


    
    Route::get('/playersCard/tournoie/{tournoieId}/etab/{etabId}', [PdfController::class, 'PlayersCardsPDF']);
    Route::get('/playersTable/tournoie/{tournoieId}/etab/{etabId}', [PdfController::class, 'PlayerstablePDF']);



    /* **************** Etabs **************** */

    Route::get('/etablissements', function () {
        return view('SAdmin/Etabs/Etabs');
    });
    Route::get('/etablissements', [EtabController::class, 'index']);
    Route::get('/etablissements/create', function () {
        return view('SAdmin/Etabs/Create');
    });
    Route::post('/etablissements/create', [EtabController::class,'store']);
    Route::delete('/etablissements/{id}', [EtabController::class,'destroy']);
    Route::get('/etablissements/{id}', function () {
        return view('SAdmin/Etabs/Details');
    });
    Route::get('/etablissements/{id}', [EtabController::class,'show']);
    Route::post('/etablissements/{id}', [EtabController::class,'update']);


    /* **************** Users **************** */

    Route::get('/users', function () {
        return view('SAdmin/Users/Users');
    });
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', function () {
        return view('SAdmin/Users/Create');
    });
    Route::get('/users/create', [UserController::class, 'Cetabs']);
    Route::post('/users/create', [UserController::class,'store']);
    
    Route::get('/users/{id}', function () {
        return view('SAdmin/Users/Details');
    });
    Route::get('/users/{id}', [UserController::class,'show']);
    Route::post('/users/{id}', [UserController::class,'update']);
    Route::delete('/users/{id}', [UserController::class,'destroy']);
    
    
    /* **************** Sports **************** */
    
    Route::get('/sports', function () {
        return view('SAdmin/Sports/Sports');
    });
    Route::get('/sports', [SportController::class, 'index']);
    Route::get('/sports/create', function () {
        return view('SAdmin/Sports/Create');
    });
    Route::post('/sports/create', [SportController::class,'store']);
    Route::get('/sports/{id}', function () {
        return view('SAdmin/Sports/Details');
    });
    Route::get('/sports/{id}', [SportController::class,'show']);



    /* **************** Profile **************** */

    Route::get('/profile', function () {
        return view('SAdmin/Profile/Profile');
    });
    Route::post('/profile/', [ProfileController::class,'update']);


});