<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('clients', ClientController::class);
});


Route::get('/users', [UserController::class, 'index']);


Route::put('/users/{id}',[UserController::class, 'update']);
Route::get('/users/create',[UserController::class, 'create']);

Route::get('/users/{id}',[UserController::class, 'show']);

Route::post('/users',[UserController::class, 'store']);