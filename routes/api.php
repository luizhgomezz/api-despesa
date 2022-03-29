<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth:sanctum')->prefix('auth')->group(function () {
    Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout']);
});

/* ---------- DESPESAS ---------- */
Route::middleware('auth:sanctum')->group(function () {
    Route::post('despesa', [\App\Http\Controllers\Api\v1\DespesaController::class, 'store'])->name('store');
    Route::get('despesa', [\App\Http\Controllers\Api\v1\DespesaController::class, 'index'])->name('index');
    Route::get('despesa/usuario/{userId}', [\App\Http\Controllers\Api\v1\DespesaController::class, 'show'])->name('show');
    Route::delete('despesa/{userId}', [\App\Http\Controllers\Api\v1\DespesaController::class, 'delete'])->name('delete');
    Route::put('despesa', [\App\Http\Controllers\Api\v1\DespesaController::class, 'update'])->name('update');
    Route::resource('despesa', \App\Http\Controllers\Api\v1\DespesaController::class);
});
