<?php

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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ApontamentoController;
use App\Http\Controllers\Api\DocumentoController;
use App\Http\Controllers\Api\OrdemServicoController;

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->middleware(['block.ip', 'log.requests']);

    Route::middleware('auth:sanctum')->group(function () {
        // Autenticação
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);

        Route::apiResource('usuarios', UsuarioController::class);
        Route::apiResource('ordemservico', OrdemServicoController::class);
        Route::apiResource('apontamento', ApontamentoController::class);
        Route::apiResource('documento', DocumentoController::class);
    });
});
