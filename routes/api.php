<?php

use App\Http\Controllers\Cargo\cargoController;
use App\Http\Controllers\Departamento\departamentoController;
use App\Http\Controllers\Usuario\usuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('cargo', cargoController::class);
Route::apiResource('departamento', departamentoController::class);
Route::apiResource('usuario', usuarioController::class);