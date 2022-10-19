<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenController;

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
    Route::get('/cari', 'cariDokumen')->name('cari.default');
});
