<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// User App\Http\Controllers\User\
use App\Http\Controllers\User\DashboardControllerUser;
use App\Http\Controllers\User\PohonControllerUser;
use App\Http\Controllers\User\UserControllerUser;

// Admin App\Http\Controllers\Admin\
use App\Http\Controllers\Admin\AdminControllerAdmin;
use App\Http\Controllers\Admin\DashboardControllerAdmin;
use App\Http\Controllers\Admin\JenisPohonControllerAdmin;
use App\Http\Controllers\Admin\KawasanControllerAdmin;
use App\Http\Controllers\Admin\KelompokTanamanControllerAdmin;
use App\Http\Controllers\Admin\PengelolaControllerAdmin;
use App\Http\Controllers\Admin\PohonControllerAdmin;
use App\Http\Controllers\Admin\StatusKawsanControllerAdmin;
use App\Http\Controllers\Admin\UserControllerAdmin;
use App\Http\Controllers\Admin\ProfileControllerAdmin;
use App\Http\Controllers\Admin\JadwalKegiatanControllerAdmin;

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

// User
// Route Dashboard
Route::get('/dashboard-user', [DashboardControllerUser::class, 'index'])->middleware('auth:web');
Route::get('/user-dashboard', [DashboardControllerUser::class, 'user_dashboard'])->middleware('auth:web');
Route::get('/scan', [DashboardControllerUser::class, 'scan'])->middleware('auth:web');
Route::post('/validasi', [DashboardControllerUser::class, 'validasi'])->name('validasi')->middleware('auth:web');
// Route Pohon
Route::get('/pilih-profil-pohon', [PohonControllerUser::class, 'profil_pohon'])->middleware('auth:web');
Route::get('/pilih-pohon', [PohonControllerUser::class, 'pilih_pohon'])->middleware('auth:web');
// Route pohon
Route::post('/tambah-pohon', [PohonControllerUser::class, 'store'])->middleware('auth:web');
// Route User
Route::put('/update-profile/{user}', [UserControllerUser::class, 'update_profile'])->middleware('auth:web');


// Admin
// Route Dashboard
Route::get('/dashboard-admin', [DashboardControllerAdmin::class, 'index'])->middleware('auth:admin');
// Route Kelompok Tanaman
Route::resource('/kelompok-tanaman', KelompokTanamanControllerAdmin::class)->middleware('auth:admin');
// Route Data Jenis
Route::resource('/data-jenis', JenisPohonControllerAdmin::class)->middleware('auth:admin');
// Route Data Kawasan
Route::resource('/data-kawasan', KawasanControllerAdmin::class)->middleware('auth:admin');
// Route Status Kawasan
Route::resource('/status-kawasan', StatusKawsanControllerAdmin::class)->middleware('auth:admin');
// Route Data Pengelola
Route::resource('/data-pengelola', PengelolaControllerAdmin::class)->middleware('auth:admin');
// Route Data Pohon
Route::resource('/data-pohon', PohonControllerAdmin::class)->middleware('auth:admin');
// Route Admin
Route::resource('/admin', AdminControllerAdmin::class)->middleware('auth:admin');
// Route Profile Admin
Route::get('/profile-admin', [ProfileControllerAdmin::class, 'index'])->middleware('auth:admin');
Route::get('/profile-admin/edit', [ProfileControllerAdmin::class, 'profile_admin'])->middleware('auth:admin');
Route::post('/profile-admin', [ProfileControllerAdmin::class, 'update_profile'])->middleware('auth:admin');
// Route User
Route::resource('/user', UserControllerAdmin::class)->middleware('auth:admin');
// Route Jadwal Kegiatan
Route::resource('/jadwal-kegiatan', JadwalKegiatanControllerAdmin::class)->middleware('auth:admin');


// route AuthController
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:admin,web');
