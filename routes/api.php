<?php

use App\Http\Controllers\CabinLevelController;
use App\Http\Controllers\CabinServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

 Route::get('/hola/locos',
 [ App\Http\Controllers\CabinController::class,'index']);

 Route::post('/v1/login',
 [App\Http\Controllers\api\v1\AuthController::class,
 'login'])->name('api.login');


 Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('/v1/logout',
    [App\Http\Controllers\api\v1\AuthController::class,
    'logout'])->name('api.logout');

 Route::apiResource('/cabins',App\Http\Controllers\CabinController::class);

 Route::apiResource('/cabin_levels', CabinLevelController::class);

 Route::apiResource('/reservations', ReservationController::class);

 Route::apiResource('/service', ServiceController::class);

 Route::apiResource('/cabin_service', CabinServiceController::class);
 
   });



   //****CON RUTAS PROTEGIDAS**//

/*    <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/v1/login', [App\Http\Controllers\api\v1\AuthController::class, 'login'])->name('api.login');

// Grupo de rutas protegidas con autenticación de Sanctum
Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('/v1/logout', [App\Http\Controllers\api\v1\AuthController::class, 'logout'])->name('api.logout');

    // Protegiendo la ruta /cabins y cualquier subruta dentro de este controlador
    Route::apiResource('/cabins', App\Http\Controllers\CabinController::class);

    Route::get('/hola/locos', [App\Http\Controllers\CabinController::class, 'index']);
}); */