<?php

use App\Http\Controllers\AuthorizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthorizationController::class,'login'])->name('v1.api.login');
    Route::post('/register', [AuthorizationController::class,'register'])->name('v1.api.register');

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthorizationController::class,'logout'])->name('v1.api.logout');
    });
});