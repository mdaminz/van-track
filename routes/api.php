<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RFIDController;

Route::post('/rfid-data', [RFIDController::class, 'storeRFIDData']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
