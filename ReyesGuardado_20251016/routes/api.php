<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\ZonaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/zonas',[ZonaController::class,'obtenerZonas']); //PLURAL

Route::get('/zona/{idzona}',[ZonaController::class,'obtenerZonas']); //SINGULAR
