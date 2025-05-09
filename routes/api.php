<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\Auth\RegisteredController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/games', [GameController::class,'index'])->name('games.index');
Route::get('/games/create', [GameController::class,'create'])->name('games.create');
Route::post('/games', [GameController::class,'store'])->name('games.store');
Route::get('/games/edit/{game}', [GameController::class,'edit'])->name('games.edit');
Route::put('/games/update/{game}', [GameController::class,'update'])->name('games.update');
Route::delete('/games/destroy/{game}', [GameController::class,'destroy'])->name('games.destroy');

Route::post('/register', [RegisteredController::class, 'store']);
Route::post('/login', [AuthenticatedController::class, 'store']);
Route::post('/logout', [AuthenticatedController::class, 'destroy'])->middleware('auth:sanctum');
