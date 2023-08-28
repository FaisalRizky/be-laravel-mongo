<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\TransactionController;
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
        Route::post('/transaction', [TransactionController::class,'createTransaction'])->name('v1.api.create.transaction');
        Route::get('/transaction', [TransactionController::class,'getSellTransactions'])->name('v1.api.get.sell.transaction');
        Route::get('/vehicle', [TransactionController::class,'getDetail'])->name('v1.api.get.vehicle');
    });
});