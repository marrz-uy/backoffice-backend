<?php

use App\Events\ClientNotifications;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ImagenesPuntoInteresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PuntosInteresController;
use App\Http\Controllers\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/LoginController', [LoginController::class, 'credentials']);
Route::post('/UsuariosAD', [LoginController::class, 'CrearUsuario']);
Route::post('me', [LoginController::class, 'me']);

//PUNTOS DE INTERES-------------------------------------------------------------------------------------------------------------------------->
Route::post('/PuntosInteres', [PuntosInteresController::class, 'store']);
Route::get('/PuntosInteres/{Categoria}', [PuntosInteresController::class, 'ListarPuntosDeInteres']);
Route::patch('/PuntosInteres/{id}', [PuntosInteresController::class, 'update']);
Route::delete('/PuntosInteres/{id}', [PuntosInteresController::class, 'destroy']);

//IMAGENES DEPUNTOS DE INTERES-------------------------------------------------------------------------------------------------------------------------->
Route::POST('/cargarImagen', [ImagenesPuntoInteresController::class, 'saveImage']);
Route::GET('/showImages/{id}', [ImagenesPuntoInteresController::class, 'showImages']);
Route::POST('/EliminarImagen', [ImagenesPuntoInteresController::class, 'EliminarImagen']);

//EVENTOS-------------------------------------------------------------------------------------------------------------------------->
Route::get('/Eventos', [EventosController::class, 'show'])->middleware("api");
Route::post('/Eventos', [EventosController::class, 'store']);
Route::delete('/Eventos/{id}', [EventosController::class, 'destroy']);
Route::patch('/Eventos/{id}', [EventosController::class, 'update']);
Route::post('/Eventos/{id}', [EventosController::class, 'ModificarImagenesEventos']);

//TOUR PREDEFINIDO-------------------------------------------------------------------------------------------------------------------------->
Route::POST('/tourPredefinido', [TourController::class, 'InsertarTourPredefinido']);
Route::GET('/tourPredefinido', [TourController::class, 'ListarToursPredefinidos']);
Route::PATCH('tourPredefinido', [TourController::class, 'ModificarTourPredefinido']);
Route::DELETE('/tourPredefinido/{i}', [TourController::class, 'destroy']);
Route::POST('/tourPredefinido/{id}', [TourController::class, 'ModificarImagenesTour']);

//AUXILIARES-------------------------------------------------------------------------------------------------------------------------->
Route::GET('/Estadisticas', [PuntosInteresController::class, 'Estadisticas']);
Route::group([

    'middleware' => 'api',
    'prefix'     => 'auth',

], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    //Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

/* RUTA DE EVENTO NOTIFICACIONES CON SUS CAMPOS */
Route::post('/message', function (Request $request) {
    event(new ClientNotifications($request->title, $request->message));
    return response()->json(['message' => 'El mensaje ha sido enviado'], 200);
})->name('send-message');
