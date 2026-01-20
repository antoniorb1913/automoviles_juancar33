<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return 'Bienvenido :) - Roger FEDERER Goat';
});

Route::get('/sales', [SaleController::class, 'index']);
Route::get('/cars', [CarController::class, 'index']);
Route::post('/sale', [SaleController::class, 'createSale']);
Route::put('/status', [SaleController::class, 'updateStatus']);