<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RekamedisController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FarmasiController;



Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest')->name('/login');
Route::get('register', [LoginController::class, 'index_register'])->middleware('guest')->name('register');
Route::post('register', [LoginController::class, 'Store']);
Route::post('gantipassword', [LoginController::class, 'Gantipassword'])->middleware('auth')->name('gantipassword');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profil', [LoginController::class, 'profilindex'])->name('profil');

Route::get('/dashboard', [DashboardController::class, 'Index'])->middleware('auth')->name('dashboard');
Route::get('pendaftaran', [RekamedisController::class, 'Index'])->middleware('auth')->name('pendaftaran');
Route::get('riwayatpendaftaran', [RekamedisController::class, 'riwayatpendaftaran'])->middleware('auth')->name('riwayatpendaftaran');
Route::post('ambil_data_pasien', [RekamedisController::class, 'AmbilDataPasien'])->middleware('auth')->name('ambil_data_pasien');
Route::post('ambil_data_pasien_cari', [RekamedisController::class, 'AmbilDataPasienCari'])->middleware('auth')->name('ambil_data_pasien_cari');
Route::post('ambil_data_antrian', [RekamedisController::class, 'AmbilAntrian'])->middleware('auth')->name('ambil_data_antrian');
Route::post('ambil_riwayat_daftar', [RekamedisController::class, 'AmbilRiwayatDaftar'])->middleware('auth')->name('ambil_riwayat_daftar');
Route::post('ambil_form_pendaftaran', [RekamedisController::class, 'AmbilFormPendaftaran'])->middleware('auth')->name('ambil_form_pendaftaran');
Route::post('simpan_pendaftaran', [RekamedisController::class, 'SimpanPendaftaran'])->middleware('auth')->name('simpan_pendaftaran');
Route::post('updateantrian', [RekamedisController::class, 'UpdateAntrian'])->middleware('auth')->name('updateantrian');
Route::get('cariprovinsi', [RekamedisController::class, 'CariProvinsi'])->middleware('auth')->name('cariprovinsi');
Route::get('carikabupaten', [RekamedisController::class, 'CariKabupaten'])->middleware('auth')->name('carikabupaten');
Route::get('carikecamatan', [RekamedisController::class, 'CariKecamatan'])->middleware('auth')->name('carikecamatan');
Route::get('caridesa', [RekamedisController::class, 'CariDesa'])->middleware('auth')->name('caridesa');
Route::post('simpanpasienbaru', [RekamedisController::class, 'SimpanPasienBaru'])->middleware('auth')->name('simpanpasienbaru');
Route::post('batalkunjungan', [RekamedisController::class, 'batalkunjungan'])->middleware('auth')->name('batalkunjungan');
Route::post('detail_pelayanan', [RekamedisController::class, 'detail_pelayanan'])->middleware('auth')->name('detail_pelayanan');


Route::get('ermpasien', [PelayananController::class, 'Index'])->middleware('auth')->name('ermpasien');
Route::get('riwayatpelayanan', [PelayananController::class, 'riwayatpelayanan'])->middleware('auth')->name('riwayatpelayanan');
Route::post('ambil_antrian_erm', [PelayananController::class, 'AntrianErm'])->middleware('auth')->name('ambil_antrian_erm');
Route::post('form_erm', [PelayananController::class, 'FormErm'])->middleware('auth')->name('form_erm');
Route::post('simpan_assesment', [PelayananController::class, 'SimpanAssesment'])->middleware('auth')->name('simpan_assesment');
Route::post('ambil_riwayat_tindakan', [PelayananController::class, 'AmbilRiwayatTindakan'])->middleware('auth')->name('ambil_riwayat_tindakan');
Route::post('retursatulayanan', [PelayananController::class, 'retursatulayanan'])->middleware('auth')->name('retursatulayanan');

// Master
Route::get('master', [MasterController::class, 'Index'])->middleware('auth')->name('master');
Route::get('pasien', [MasterController::class, 'pasien'])->middleware('auth')->name('pasien');
Route::get('pegawai', [MasterController::class, 'pegawai'])->middleware('auth')->name('pegawai');
Route::get('user', [MasterController::class, 'user'])->middleware('auth')->name('user');
Route::post('detailuser', [MasterController::class, 'detailuser'])->middleware('auth')->name('detailuser');
Route::post('simpaneditpasien', [MasterController::class, 'simpaneditpasien'])->middleware('auth')->name('simpaneditpasien');
Route::post('ambil_master_kary', [MasterController::class, 'ambil_master_kary'])->middleware('auth')->name('ambil_master_kary');
Route::post('simpankary', [MasterController::class, 'simpankary'])->middleware('auth')->name('simpankary');
Route::post('ambil_master_user', [MasterController::class, 'ambil_master_user'])->middleware('auth')->name('ambil_master_user');
Route::post('ambil_master_pasien', [MasterController::class, 'ambil_master_pasien'])->middleware('auth')->name('ambil_master_pasien');
Route::post('ambil_master_tarif', [MasterController::class, 'ambil_master_tarif'])->middleware('auth')->name('ambil_master_tarif');
Route::get('diagnosa', [MasterController::class, 'diagnosa'])->middleware('auth')->name('diagnosa');
Route::get('tarif', [MasterController::class, 'tarif'])->middleware('auth')->name('tarif');


//Farmasi
Route::get('layananresep', [FarmasiController::class, 'Index'])->name('layananresep');
Route::get('masterobat', [FarmasiController::class, 'masterobat'])->name('masterobat');
Route::get('stokobat', [FarmasiController::class, 'stokobat'])->name('stokobat');
Route::get('riwayatresep', [FarmasiController::class, 'riwayatresep'])->name('riwayatresep');

//keuangan
Route::get('kasir', [KeuanganController::class, 'Index'])->name('kasir');
Route::get('keuangan', [KeuanganController::class, 'Index'])->name('keuangan');
Route::get('laporankasir', [KeuanganController::class, 'laporankasir'])->name('laporankasir');
Route::post('ambil_antrian_kasir', [KeuanganController::class, 'ambil_antrian_kasir'])->name('ambil_antrian_kasir');
Route::post('detail_pembayaran', [KeuanganController::class, 'detail_pembayaran'])->name('detail_pembayaran');
Route::post('hitung_kembalian', [KeuanganController::class, 'hitung_kembalian'])->name('hitung_kembalian');
Route::post('bayarfinal', [KeuanganController::class, 'simpan_pembayaran'])->name('bayarfinal');
Route::post('ambilriwayat_kasir', [KeuanganController::class, 'Riwayat_pembayaran'])->name('ambilriwayat_kasir');
Route::post('ambilriwayat_bayar_kasir', [KeuanganController::class, 'ambilriwayat_bayar_kasir'])->name('ambilriwayat_bayar_kasir');


