<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\common\CommonController;
use App\Http\Controllers\Salud\CitaController;
use App\Http\Controllers\Salud\ConsultaController;
use App\Http\Controllers\Salud\MedicoController;
use App\Http\Controllers\Salud\OdontogramaController;
use App\Http\Controllers\Salud\PersonaController;
use App\Http\Controllers\Salud\RecetaController;
use App\Http\Controllers\Salud\SetupController;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('tipoid', [CommonController::class, 'getTipoid']);
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('profile', [AuthController::class, 'profile']);
    Route::get('logout', [AuthController::class, 'logout']);

    Route::prefix('basic')->group(function () {
        Route::get('persona-dni', [PersonaController::class, 'getPersonaDNI']);
    });

    Route::prefix('salud')->group(function () {
        // Setup
        Route::get('doctor', [SetupController::class, 'getMedicos']);
        Route::get('types-service', [SetupController::class, 'getTiposServicio']);
        Route::get('types-speciality', [SetupController::class, 'getTiposEspecialidad']);
        Route::get('types-treatment', [SetupController::class, 'getTiposTratamiento']);
        Route::get('cost', [SetupController::class, 'getCosto']);

        // Appointments
        Route::get('appointment/status', [CitaController::class, 'getEstados']);
        Route::get('appointment', [CitaController::class, 'getCitas']);
        Route::get('appointment/{citaid}', [CitaController::class, 'getCitaById']);
        Route::post('appointment', [CitaController::class, 'addCita']);

        Route::get('teeth/{tipoodontogramaid}', [OdontogramaController::class, 'getTeeth']);
        Route::get('numero-pieza/{tipoodontogramaid}', [OdontogramaController::class, 'getPiezas']);
        Route::get('face-type', [OdontogramaController::class, 'getFaceType']);
        Route::get('type-treatment', [OdontogramaController::class, 'getTypeTreatment']);

        Route::get('consultation', [ConsultaController::class, 'getConsultations']);
        Route::get('consultation/{consultaid}/odontogram', [ConsultaController::class, 'getOdontogramConsultation']);
        Route::post('consultation/{consultaid}/odontogram', [ConsultaController::class, 'addOdontogramConsultation']);
        Route::patch('consultation/{consultaid}/odontogram/{piezaid}', [ConsultaController::class, 'patchOdontogramConsultation']);
        Route::delete('consultation/{consultaid}/odontogram/{piezaid}', [ConsultaController::class, 'deleteOdontogramConsultation']);

        Route::get('recipe', [RecetaController::class, 'getRecipes']);
        Route::post('recipe', [RecetaController::class, 'addRecipe']);
        Route::delete('recipe/{recetaid}', [RecetaController::class, 'deleteRecipe']);
    });
});
