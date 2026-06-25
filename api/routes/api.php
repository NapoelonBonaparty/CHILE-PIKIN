<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VotanteController;
use App\Http\Controllers\Api\SeccionController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ApoyoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CasillaController;
use App\Models\Colonia;

Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas (Solo entra quien tenga un Token válido)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // RUTAS PARA EL PADRÓN (LISTA NOMINAL)
    Route::get('/votantes', [VotanteController::class, 'index']);
    Route::post('/votantes', [VotanteController::class, 'store']);
    Route::put('/votantes/{id}', [VotanteController::class, 'update']);
    Route::put('/votantes/{id}/clave', [VotanteController::class, 'actualizarClave']);
    Route::match(['put', 'post'], '/votantes/{id}/actualizar', [VotanteController::class, 'actualizarVotante']);

    // Rutas para el Catálogo de Secciones
    Route::get('/secciones', [SeccionController::class, 'index']);
    Route::post('/secciones', [SeccionController::class, 'store']);
    Route::put('/secciones/{id}', [SeccionController::class, 'update']);
    Route::delete('/secciones/{id}', [SeccionController::class, 'destroy']);
    Route::get('/secciones/{seccion}/encargados', [UserController::class, 'encargadosPorSeccion']);

    // RUTAS PARA EL HISTORIAL DE APOYOS
    Route::get('/votantes/{id}/apoyos', [VotanteController::class, 'historialApoyos']);
    Route::post('/votantes/{id}/apoyos', [VotanteController::class, 'asignarApoyo']);

    Route::get('/dashboard/estadisticas', [DashboardController::class, 'estadisticas']);

    Route::get('/apoyos', [ApoyoController::class, 'index']);
    Route::post('/apoyos', [ApoyoController::class, 'store']);
    Route::put('/apoyos/{id}', [ApoyoController::class, 'update']);
    Route::delete('/apoyos/{id}', [ApoyoController::class, 'destroy']);

    // Ruta para guardar o actualizar expediente
    Route::post('/votantes/{id}/expediente', [ExpedienteController::class, 'storeOrUpdate']);

    Route::apiResource('usuarios', UserController::class);

    Route::get('/secciones/{seccion_id}/casillas', [CasillaController::class, 'porSeccion']);
    Route::put('/casillas/{id}/ubicacion', [CasillaController::class, 'actualizarUbicacion']);

    Route::get('/mapa-casillas', [CasillaController::class, 'todasParaMapa']);

    // Rutas para los Gremios
    Route::get('/gremios/mototaxis', [App\Http\Controllers\Api\GremioController::class, 'obtenerMototaxis']);

    Route::get('/secciones/{seccion}/colonias', function ($seccion) { return Colonia::where('seccion', $seccion)->orderBy('nombre')->get(); });
});