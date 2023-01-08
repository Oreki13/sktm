<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanSktmController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/pengajuan-sktm', [PengajuanSktmController::class, 'create']);
Route::post('/pengajuan-sktm', [PengajuanSktmController::class, 'store']);
Route::get('/check-status/{nik}', [PengajuanSktmController::class, 'checkStatusByNik']);

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [PengajuanSktmController::class, 'index']);
        Route::get('/detail/{id}', [PengajuanSktmController::class, 'show']);
        Route::post('/pengajuan-sktm/update/{id}', [PengajuanSktmController::class, 'update']);
        Route::post('/pengajuan-sktm/edit/{id}', [PengajuanSktmController::class, 'edit']);
        Route::post('/pengajuan-sktm/delete/{id}', [PengajuanSktmController::class, 'destroy']);
    });
});
