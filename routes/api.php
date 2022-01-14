<?php

use App\Http\Controllers\DogApiController;
use App\Http\Controllers\DogController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::GET('/dogs', [DogApiController::class, 'index']);

Route::GET('/dogs/{id}', [DogApiController::class, 'show']);

//Route::POST('/dogs', )

/* 
1.- Mostrar todos perros (index GET)
2.- Mostrar perro por ID (show GET)
3.- Añadir perro (update GET)
4.- Grabar en BBDD (store PUT)
5.- Eliminar perro (destroy DELETE) 
*/