<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\RegistrantCompetitionController;
use App\Http\Controllers\TimCompetitionController;
Route::get('/', function () {
    return view('welcome');
});


Route::controller(UserController::class)->prefix('account')->middleware('auth:sanctum', 'verified')->group(function () {
    Route::get('/', 'indexUser')->name('indexusercontroller');
    Route::get('/editprofile','editProfileUser')->name('editprofileusercontroller');
    Route::post('/updateprofile','updateProfileUser')->name('updateprofileusercontroller');
});

Route::group(['prefix'=>'competitions'], function (){
    Route::controller(CompetitionController::class)->group( function() {
        Route::get('/','index')->name('competition');
        Route::get('/detail/{slug}', 'show')->name('showcompetition');
    });
    Route::controller(TimCompetitionController::class)->middleware('auth:sanctum','verified')->group(function(){
        Route::get('/{slug}/regis/{code}','edit')->name('updatetim');
        Route::get('/{slug}/regis/{code}/poster','editposter')->name('updatetimporster');
        Route::get('/detail/{slug}/regis','create')->name('registim');
        Route::get('/detail/{slug}/regis/poster','createposter')->name('registimposter');
    });
});

Route::group(['prefix'=>'event'], function(){
    Route::controller(EventController::class)->group(function (){
        Route::get('/','index')->name('event');
        Route::get('/detail/{slug}','show')->name('showevent');
        Route::get('/feedback/{slug}','feedback')->name('feedback');
        Route::post('/feedback/{slug}','storeFeedback')->name('storeFeedback');
    });
});

Route::get('/sendmessage',[TimCompetitionController::class,'verif'])->name('veriftim');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:sanctum', 'verified', 'role_or_permission:admin|dashboard-menu']], function () {
    Route::get('/', [UserController::class,'dashboard'])->name('dashboard');
    Route::controller(EventController::class)->prefix('event')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-event')->group(function () {
        Route::get('/', 'indexdashboard')->name('indexdashboardcontroller');
        Route::get('/add', 'createdashboard')->name('createdashboardcontroller');
        Route::get('/{idevent}/edit', 'editdashboard')->name('editdashboardcontroller');
    });
    Route::controller(EventController::class)->prefix('detailevent')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-event')->group(function () {
        Route::get('/{slug}', 'registranteventdashboard')->name('registranteventdashboardcontroller');
    });
    Route::controller(CompetitionController::class)->prefix('competition')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-competition')->group(function () {
        Route::get('/', 'indexdashboard')->name('indexdashboardcompetitioncontroller');
        Route::get('/add', 'createdashboard')->name('createdashboardcompetitioncontroller');
        Route::get('/{idcompetition}/edit', 'editdashboard')->name('editdashboardcompetitioncontroller');
    });
    Route::controller(TimCompetitionController::class)->prefix('detailcompetition')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-competition')->group(function () {
        Route::get('/{slug}', 'indexdetailtimcompetitionbyslugdashboard')->name('indexdetailtimcompetitionbyslugdashboard');
    });
    Route::controller(RegistrantCompetitionController::class)->prefix('detailcompetition')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|kestary|lo|action-competition')->group(function () {
        Route::get('/{slug}/detailtim/{namereg}', 'indexdetailregistrantcompetitionbycompetitiondashboard')->name('indexdetailregistrantcompetitionbycompetitiondashboard');
        Route::get('/{slug}/detailtim/{namereg}/poster', 'indexdetailregistrantcompetitionbycompetitiondashboardposter')->name('indexdetailregistrantcompetitionbycompetitiondashboardposter');
    });

    Route::controller(CommentController::class)->prefix('contact')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|action-comment')->group(function () {
        Route::get('/', 'indexdashboardcomment')->name('indexdashboardcomment');
        Route::get('/{idcomment}/detail', 'detaildashboardcomment')->name('editdashboardcomment');
        Route::get('/{idcomment}/delete', 'deletedashboardcomment')->name('deletedashboardcomment');
    });

    Route::controller(UserController::class)->prefix('manageuser')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|action-manageuser')->group(function () {
        Route::get('/', 'indexdashboard')->name('indexdashboardusercontroller');
    });
    Route::controller(UserController::class)->prefix('managerole')->middleware('auth:sanctum', 'verified', 'role_or_permission:admin|action-manageuser')->group(function () {
        Route::get('/', 'indexdashboardrole')->name('indexdashboardrolecontroller');
    });
});
