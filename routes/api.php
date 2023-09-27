<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JenisPohonController;
use App\Http\Controllers\Api\KawasanController;
use App\Http\Controllers\Api\KelompokTanamanController;
use App\Http\Controllers\Api\StatusKawasanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::group(['prefix' => 'kelompok-tanaman'], function() {
        Route::get('/', [KelompokTanamanController::class, 'index']);
        Route::post('/tambah', [KelompokTanamanController::class, 'store']);
        Route::get('/{kelompok_tanaman}', [KelompokTanamanController::class, 'show']);
        Route::post('/{kelompok_tanaman}/edit', [KelompokTanamanController::class, 'update']);
        Route::post('/{kelompok_tanaman}/hapus', [KelompokTanamanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'data-jenis'], function() {
        Route::get('/', [JenisPohonController::class, 'index']);
        Route::post('/tambah', [JenisPohonController::class, 'store']);
        Route::get('/{jenis_pohon}', [JenisPohonController::class, 'show']);
        Route::post('/{jenis_pohon}/edit', [JenisPohonController::class, 'update']);
        Route::post('/{jenis_pohon}/hapus', [JenisPohonController::class, 'destroy']);
    });

    Route::group(['prefix' => 'data-kawasan'], function() {
        Route::get('/', [KawasanController::class, 'index']);
        Route::post('/tambah', [KawasanController::class, 'store']);
        Route::get('/{kawasan}', [KawasanController::class, 'show']);
        Route::post('/{kawasan}/edit', [KawasanController::class, 'update']);
        Route::post('/{kawasan}/hapus', [KawasanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'status-kawasan'], function() {
        Route::get('/', [StatusKawasanController::class, 'index']);
        Route::post('/tambah', [StatusKawasanController::class, 'store']);
        Route::get('/{status_kawasan}', [StatusKawasanController::class, 'show']);
        Route::post('/{status_kawasan}/edit', [StatusKawasanController::class, 'update']);
        Route::post('/{status_kawasan}/hapus', [StatusKawasanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'data-pengelola'], function() {
        Route::get('/', [StatusKawasanController::class, 'index']);
        Route::post('/tambah', [StatusKawasanController::class, 'store']);
        Route::get('/{pengelola}', [StatusKawasanController::class, 'show']);
        Route::post('/{pengelola}/edit', [StatusKawasanController::class, 'update']);
        Route::post('/{pengelola}/hapus', [StatusKawasanController::class, 'destroy']);
    });
    
    Route::get('logout', [AuthController::class, 'logout']);
});