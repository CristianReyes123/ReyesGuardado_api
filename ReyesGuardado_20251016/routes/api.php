<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonaController;
use App\Http\controllers\RegisterController;

Route::get('/user', function (Request $request) 
{
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/zonas',[ZonaController::class,'obtenerZonas']); //PLURAL
Route::get('/zona/{idzona}',[ZonaController::class,'obtenerZona']); //SINGULAR
Route::get('/zonaspais/{idpais}',[ZonaController::class,'obtenerZonaPais']); //
Route::post('/nuevazona',[ZonaController::class,'crearZona']); 

Route::controller(RegisterController::class)->group(function()
{
    Route::post('register','register');
    Route::post('login','login');
});