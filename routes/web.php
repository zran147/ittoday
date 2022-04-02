<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\RegistrantCompetitionController;
use App\Http\Controllers\TimCompetitionController;


Route::get('/', function () {
    return view('welcome');
});
// Route::get('/veri',[CompetitionController::class,'verif']);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:sanctum', 'verified', 'role_or_permission:admin|dashboard-menu']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::controller(EventController::class)->prefix('event')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-event')->group(function () {
        Route::get('/', 'indexdashboard')->name('indexdashboardcontroller');
        Route::get('/add', 'createdashboard')->name('createdashboardcontroller');
        Route::get('/{idevent}/edit', 'editdashboard')->name('editdashboardcontroller');
    });
    Route::controller(EventController::class)->prefix('detailevent')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-event')->group(function () {
        Route::get('/{slug}', 'registranteventdashboard')->name('registranteventdashboardcontroller');
    });
    Route::controller(CompetitionController::class)->prefix('competition')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-competision')->group(function () {
        Route::get('/', 'indexdashboard')->name('indexdashboardcompetitioncontroller');
        Route::get('/add', 'createdashboard')->name('createdashboardcompetitioncontroller');
        Route::get('/{idcompetition}/edit', 'editdashboard')->name('editdashboardcompetitioncontroller');
    });
    Route::controller(TimCompetitionController::class)->prefix('detailcompetition')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-competision')->group(function () {
        Route::get('/{slug}', 'indexdetailtimcompetitionbyslugdashboard')->name('indexdetailtimcompetitionbyslugdashboard');
    });
    Route::controller(RegistrantCompetitionController::class)->prefix('detailcompetition')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-competision')->group(function () {
        Route::get('/{slug}/detailtim/{namereg}', 'indexdetailregistrantcompetitionbycompetitiondashboard')->name('indexdetailregistrantcompetitionbycompetitiondashboard');
    });
    Route::controller(UserController::class)->prefix('manageuser')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|action-manageuser')->group(function () {
        Route::get('/', 'indexdashboard')->name('indexdashboardusercontroller');
    });
    Route::controller(UserController::class)->prefix('managerole')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|action-manageuser')->group(function () {
        Route::get('/', 'indexdashboardrole')->name('indexdashboardrolecontroller');
    });
});
