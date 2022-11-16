<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PengelolaController;

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

Route::controller(DokumenController::class)->group(function () {
    /**
     * Default route
     */
    Route::get('/', 'index')->name('beranda');

    /**
     * Route ke list dokumen hukum & detailnya
     */
    Route::get('/dokumen', 'semuaDokumen')->name('dokumen');
    Route::get('/perdes/{id?}/{title?}', 'perdes')->name('perdes');
    Route::get('/perkades/{id?}/{title?}', 'perkades')->name('perkades');
    Route::get('/permakades/{id?}/{title?}', 'permakades')->name('permakades');
    Route::get('/sk-kades/{id?}/{title?}', 'keputusan')->name('keputusan');
    Route::get('/lain-lain/{id?}/{title?}', 'dokumenLain')->name('lain-lain');

    /**
     * Route ke fitur pencarian dokumen
     */
    Route::get('/cari', 'cariDokumen')->name('cari');

    /**
     * Route unduh berkas terkait suatu dokumen
     */
    Route::get('/unduh/{id}', 'unduhBerkas')->name('berkas.unduh');
});

/**
 * Route ke halaman-halaman untuk admin
 */
Route::controller(PengelolaController::class)->name('admin.')->group(function () {
    /**
     * Route ke fitur otentikasi pengguna
     */
    Route::get('/pintu-masuk', 'login')->name('login');
    Route::post('/login', 'prosesLogin')->name('login.proses');
    Route::get('/logout', 'logout')->name('logout');

    /**
     * Semua route yang hanya bisa diakses oleh pengelola terotentikasi
     */
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/daftar-dokumen', 'dokumen')->name('dokumen');

        Route::name('dokumen.')->group(function () {
            Route::get('/detail-dokumen/{id}', 'detailDokumen')->name('detail');
            Route::get('/tambah-dokumen', 'tambahDokumen')->name('tambah');
            Route::post('/tambah-dokumen', 'prosesKelolaDokumen')->name('tambah.proses');
            Route::get('/ubah-dokumen/{id}', 'ubahDokumen')->name('ubah');
            Route::put('/ubah-dokumen/{id}', 'prosesKelolaDokumen')->name('ubah.proses');
        });

        Route::name('berkas.')->group(function () {
            Route::get('/unggah-berkas/{idDokumen}', 'unggahBerkas')->name('unggah');
            Route::post('/unggah-berkas/{idDokumen}', 'prosesUnggahBerkas')->name('unggah.proses');
        });
    });
});
