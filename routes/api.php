<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/users', [UserController::class, 'index']);


Route::put('/users/{id}',[UserController::class, 'update']);
Route::get('/users/create',[UserController::class, 'create']);

Route::get('/users/{id}',[UserController::class, 'show']);

Route::post('/users',[UserController::class, 'store']);

Route::get('/clients', [ClientController::class, 'index']);

Route::post('/clients', [ClientController::class, 'store']);

Route::delete('/clients/{id}', [ClientController::class, 'destroy']);

Route::put('/clients/{id}', [ClientController::class, 'update']);