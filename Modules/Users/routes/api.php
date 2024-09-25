<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\app\Http\Controllers\Api\UserController;
use Modules\Users\Http\Controllers\Auth\AuthController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 */
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('jwt')->prefix('auth')->group(function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::prefix('v1')->middleware('jwt')->group(function () {
    Route::apiResource('users', UserController::class);
});
