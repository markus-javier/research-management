<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
    Route::prefix('auth')->group(function () {
        Route::post('/register', [RegistrationController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });
    Route::middleware('auth:sanctum')->prefix('auth')->group(function () {
        Route::get('/user', [AuthController::class, 'getUser']);
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::post('/change-password', [AuthController::class, 'changePassword']);
        Route::get('/isloggedin', [AuthController::class, 'isLoggedIn']);
    });
});
