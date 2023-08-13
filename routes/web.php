<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RekamedisController;
use App\Http\Controllers\PelayananController;


Route::get('/', [DashboardController::class, 'Index'])->name('dashboard');
Route::get('pendaftaran', [RekamedisController::class, 'Index'])->name('pendaftaran');
Route::get('ermpasien', [PelayananController::class, 'Index'])->name('ermpasien');

// Master
Route::get('master', [MasterController::class, 'Index'])->name('master');
Route::get('pasien', [MasterController::class, 'pasien'])->name('pasien');
Route::get('pegawai', [MasterController::class, 'pegawai'])->name('pegawai');
Route::get('user', [MasterController::class, 'user'])->name('user');
Route::get('diagnosa', [MasterController::class, 'diagnosa'])->name('diagnosa');
Route::get('tarif', [MasterController::class, 'tarif'])->name('tarif');




//keuangan
Route::get('kasir', [KeuanganController::class, 'Index'])->name('kasir');


