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

use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\ApontamentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdemServicoController;

Route::prefix('v1')->group(function () {
    //Autenticação - Login
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        //Autenticação
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);

        //Usuário
        Route::get('/usuarios', [UsuarioController::class, 'index']);
        Route::post('/usuarios', [UsuarioController::class, 'store']);
        Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
        Route::patch('/usuarios/{id}', [UsuarioController::class, 'update']);
        Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

        //Ordem de Serviço (O.S)
        Route::get('/ordemservico', [OrdemServicoController::class, 'index']);
        Route::post('/ordemservico', [OrdemServicoController::class, 'store']);
        Route::get('/ordemservico/{id}', [OrdemServicoController::class, 'show']);
        Route::patch('/ordemservico/{id}', [OrdemServicoController::class, 'update']);
        Route::delete('/ordemservico/{id}', [OrdemServicoController::class, 'destroy']);

        //Apontamentos
        Route::get('/apontamento', [ApontamentoController::class, 'index']);
        Route::post('/apontamento', [ApontamentoController::class, 'store']);
        Route::get('/apontamento/{id}', [ApontamentoController::class, 'show']);
        Route::patch('/apontamento/{id}', [ApontamentoController::class, 'update']);
        Route::delete('/apontamento/{id}', [ApontamentoController::class, 'destroy']);

        //Documentos
        Route::get();
        Route::post();
        Route::get();
        Route::patch();
        Route::delete();
    });
});
