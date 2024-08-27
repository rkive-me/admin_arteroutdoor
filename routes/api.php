<?php

use App\Http\Controllers\Api\ApiProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('penyewa/register', [AuthController::class, 'register']);
Route::post('penyewa/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('penyewa/logout', [AuthController::class, 'logout']);
    Route::post('penyewa/refresh', [AuthController::class, 'refresh']);
    // Route::get('penyewa/profile', [AuthController::class, 'profile'] );
});

Route::middleware('auth:api')->get('/penyewa/profile', [AuthController::class, 'profile']);

Route::apiResource('products', ApiProduct::class);
