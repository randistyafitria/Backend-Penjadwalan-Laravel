<?php

namespace App\Http\Controllers;

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

Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware'=>['auth:api']], function(){
    Route::resource('/dosen', DosenController::class);
    Route::resource('/ruang', RuangController::class);
    Route::resource('/jadwalkuliah', JadkulController::class);  
    Route::resource('/user', UserController::class);  
    Route::resource('/jam', JamController::class);
    Route::resource('/hari', HariController::class);
    Route::resource('/waktu_tidak_bersedia', Waktu_tidak_bersediaController::class);
    Route::resource('/pengampu', PengampuController::class);
    Route::resource('/matakuliah', MatkulController::class);
    
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/user', [LoginController::class, 'index']);
});