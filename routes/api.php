<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\common\CommonController;
use App\Http\Controllers\Salud\OdontogramaController;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('tipoid', [CommonController::class, 'getTipoid']);
});

Route::group(['middleware' => ['auth:api']], function(){
    Route::get('profile', [AuthController::class, 'profile']);
    Route::get('logout', [AuthController::class, 'logout']);

    Route::prefix('salud')->group(function () {
        Route::get('teeth/{tipoodontogramaid}', [OdontogramaController::class, 'getTeeth']);
        Route::get('numero-pieza/{tipoodontogramaid}', [OdontogramaController::class, 'getPiezas']);
        Route::get('face-type', [OdontogramaController::class, 'getFaceType']);
        Route::get('type-treatment', [OdontogramaController::class, 'getTypeTreatment']);
    });
});

