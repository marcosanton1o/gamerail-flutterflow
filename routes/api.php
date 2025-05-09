<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\Auth\RegisteredController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/games/handle', [GameApiController::class, 'handle']);

Route::post('/register', [RegisteredController::class, 'store']);
Route::post('/login', [AuthenticatedController::class, 'store']);
Route::post('/logout', [AuthenticatedController::class, 'destroy'])->middleware('auth:sanctum');
