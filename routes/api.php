<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterialController;


Route::post('/authorization', [UserController::class, 'login']);
Route::post('/registration', [UserController::class, 'reg']);

Route::get('/image/{image}', [ImageController::class, 'get']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::prefix('image')->group(function () {
        Route::post('/', [ImageController::class, 'add']);
        Route::delete('/{image}', [ImageController::class, 'delete']);
    });

    Route::prefix('client')->group(function () {
        Route::get('/{client}', [ClientController::class, 'get']);
        Route::delete('/{client}', [ClientController::class, 'delete']);
        Route::post('/', [ClientController::class, 'add']);
        Route::get('/', [ClientController::class, 'all']);
    });

    Route::prefix('material')->group(function () {
        Route::get('/{material}', [MaterialController::class, 'get']);
        Route::delete('/{material}', [MaterialController::class, 'delete']);
        Route::patch('/{material}', [MaterialController::class, 'patch']);
        Route::post('/', [MaterialController::class, 'add']);
        Route::get('/', [MaterialController::class, 'all']);
    });
});
