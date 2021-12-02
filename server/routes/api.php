<?php

use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\OpcionController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\SeccionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('encuestas', EncuestaController::class);
Route::apiResource('secciones', SeccionController::class)->parameters([
    'secciones' => 'seccion',
]);
Route::apiResource('preguntas', PreguntaController::class);
Route::apiResource('opciones', OpcionController::class)->parameters([
    'opciones' => 'opcion',
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
