<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [LandingController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/mahasiswa/getdata', [UserController::class, 'getMahasiswaData']);
    Route::get('/dosen/getdata', [UserController::class, 'getDosenData']);

    Route::get('/create', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
});

Route::middleware(['mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', function(){
        return dd('login mahasiswa');
    });
});

Route::middleware(['dosen'])->group(function () {
    Route::get('/dosen/dashboard', function(){
        return dd('login dosen');
    });
});

Route::middleware(['dosen:admin'])->group(function () {
    Route::get('/admin/panel', function(){
        return dd('login admin dosen');
    });
});

Route::middleware(['dosen:dosen pembimbing'])->group(function () {
    Route::get('/bimbingan', function(){
        return dd('login dosen pembimbing');
    });
});
