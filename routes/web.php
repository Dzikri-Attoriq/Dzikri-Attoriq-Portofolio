<?php

use App\Http\Controllers\StatusKawsanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPohonController;
use App\Http\Controllers\KawasanController;
use App\Http\Controllers\KelompokTanamanController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\PohonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('kelompok_tanaman/view');
// });

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/user-dashboard', [DashboardController::class, 'user_dashboard'])->middleware('auth');
Route::get('/scan', [DashboardController::class, 'scan'])->middleware('auth');
Route::post('/validasi', [DashboardController::class, 'validasi'])->name('validasi')->middleware('auth');

// route AuthController
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route Kelompok Tanaman
Route::resource('/kelompok-tanaman', KelompokTanamanController::class)->middleware('auth');

// Route Data Jenis
Route::resource('/data-jenis', JenisPohonController::class)->middleware('auth');

// Route Data Kawasan
Route::resource('/data-kawasan', KawasanController::class)->middleware('auth');

// Route Status Kawasan
Route::resource('/status-kawasan', StatusKawsanController::class)->middleware('auth');

// Route Data Pengelola
Route::resource('/data-pengelola', PengelolaController::class)->middleware('auth');

// Route Data Pohon
Route::resource('/data-pohon', PohonController::class)->middleware('auth');
Route::get('/pilih-profil-pohon', [PohonController::class, 'profil_pohon'])->middleware('auth');

// Route Data Pohon
Route::resource('/user', UserController::class)->middleware('auth');
