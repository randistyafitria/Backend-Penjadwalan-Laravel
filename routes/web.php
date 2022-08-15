<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\GenetikController;
use App\Http\Controllers\PenjadwalanController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\JadkulController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\Waktu_tidak_bersediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Mobil;
use App\Http\Controllers\Sepeda;
use App\Http\Controllers\Run;
use App\Http\Controllers\Test;
use App\Http\Controllers\ClassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/dosen', function () {
//     return view('dosen');
// });

Auth::routes();


//DASHBOARD
            // Route::get('/', [DashboardController::class, 'index']);
            Route::get('/dashboard', [DashboardController::class, 'index']);

//PENJADWALAN
            //Route::get('/penjadwalan', [GenetikController::class, 'index'])->name('penjadwalans');
            //Route::get('/penjadwalan', [PenjadwalanController::class, 'index']);

//DOSEN
            Route::get('/dosen', [DosenController::class, 'index']);
            Route::get('/dosen/create', [DosenController::class, 'create']);

//HARI
            Route::get('/hari', [HariController::class, 'index']);

//JAM
            Route::get('/jam', [JamController::class, 'index']);

//JADKUL
            Route::get('/jadwalkuliah', [JadkulController::class, 'index']);
            
            Route::get('/jadwalkuliah/create', [Run::class, 'index']);

//MATKUL
            Route::get('/matakuliah', [MatkulController::class, 'index']);

            //Route::get('/matakuliah/create', [Sepeda::class, 'lihat_ciri']);

//PENGAMPU
            Route::get('/pengampu', [PengampuController::class, 'index']);

//RUANG
            Route::get('/ruang', [RuangController::class, 'index']);

//WAKTU TDK BSD
            Route::get('/waktu_tidak_bersedia', [Waktu_tidak_bersediaController::class, 'index']);

//BLOG
            Route::get('/blog', [BlogController::class, 'index']);
            Route::get('/blog/{id}', [BlogController::class, 'show']);

Route::get('/test', [Test::class, 'index']);

Route::get('/gkelas', [ClassController::class, 'GetKelas']);
Route::get('/gjam', [ClassController::class, 'GetJam']);
Route::get('/ghari', [ClassController::class, 'GetHari']);
Route::get('/gruang', [ClassController::class, 'GetRuang']);
Route::get('/timeoff', [ClassController::class, 'GetTimeOffDosen']);
Route::get('/jadwalkosong', [ClassController::class, 'KosongkanJadwal']);
Route::get('/insertjadwal', [ClassController::class, 'InsertJadwal']);
Route::get('/jadwal', [ClassController::class, 'GetJadwal']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/genetik', [PenjadwalanController::class, 'index']);