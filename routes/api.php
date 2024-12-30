<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    //Clients
    Route::apiResource('clients', ClientController::class);
    //Products
    Route::apiResource('products', ProductController::class);
    
    //Users
    Route::get('/users', [UserController::class, 'index']);
    Route::put('/users/{id}',[UserController::class, 'update']);
    Route::get('/users/create',[UserController::class, 'create']);
    Route::get('/users/{id}',[UserController::class, 'show']);
    Route::post('/users',[UserController::class, 'store']);
});



