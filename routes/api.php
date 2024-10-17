<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//   return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('cabins',
App\Http\Controllers\CabinController::class);

Route::get('/hola/locos',
    [App\Http\Controllers\CabinController::class,
     'index'])->name('hola.locos');

