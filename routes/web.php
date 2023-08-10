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
Route::get('master', [MasterController::class, 'Index'])->name('master');

