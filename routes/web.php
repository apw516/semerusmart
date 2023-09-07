<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RekamedisController;
use App\Http\Controllers\PelayananController;


Route::get('/', [DashboardController::class, 'Index'])->name('dashboard');
Route::get('pendaftaran', [RekamedisController::class, 'Index'])->name('pendaftaran');
Route::post('ambil_data_pasien', [RekamedisController::class, 'AmbilDataPasien'])->name('ambil_data_pasien');
Route::post('ambil_data_antrian', [RekamedisController::class, 'AmbilAntrian'])->name('ambil_data_antrian');
Route::post('ambil_riwayat_daftar', [RekamedisController::class, 'AmbilRiwayatDaftar'])->name('ambil_riwayat_daftar');
Route::post('ambil_form_pendaftaran', [RekamedisController::class, 'AmbilFormPendaftaran'])->name('ambil_form_pendaftaran');
Route::post('simpan_pendaftaran', [RekamedisController::class, 'SimpanPendaftaran'])->name('simpan_pendaftaran');
Route::get('cariprovinsi', [RekamedisController::class, 'CariProvinsi'])->name('cariprovinsi');
Route::get('carikabupaten', [RekamedisController::class, 'CariKabupaten'])->name('carikabupaten');
Route::get('carikecamatan', [RekamedisController::class, 'CariKecamatan'])->name('carikecamatan');
Route::get('caridesa', [RekamedisController::class, 'CariDesa'])->name('caridesa');
Route::post('simpanpasienbaru', [RekamedisController::class, 'SimpanPasienBaru'])->name('simpanpasienbaru');
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


