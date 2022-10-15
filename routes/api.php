<?php

use App\Http\Controllers\PuntosInteresController;
use App\Http\Controllers\EventosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/LoginController', [LoginController::class, 'credentials']);


Route::post('/PuntosInteres', [PuntosInteresController::class, 'store']);
Route::get('/PuntosInteres/{Categoria}', [PuntosInteresController::class, 'ListarPuntosDeInteres']);
Route::patch('/PuntosInteres/{id}', [PuntosInteresController::class, 'update']);
Route::delete('/PuntosInteres/{id}', [PuntosInteresController::class, 'destroy']);

Route::get('/Eventos', [EventosController::class, 'show']);
Route::post('/Eventos', [EventosController::class, 'store']);
Route::delete('/Eventos/{id}', [EventosController::class, 'destroy']);
Route::patch('/Eventos/{id}', [EventosController::class, 'update']);