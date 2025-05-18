<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LandingController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::post('login', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    });
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', function () {
        return view('dashboard');
    });
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/mahasiswa/getdata', [UserController::class, 'getMahasiswaData']);
    Route::get('/dosen/getdata', [UserController::class, 'getDosenData']);
});
