<?php

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
    return view('auth.login');
});


Auth::routes();

Route::resource('jabatan', 'JabatanController');
Route::resource('barang', 'BarangController');
Route::resource('karyawan', 'KaryawanController');
Route::resource('kendaraan', 'KendaraanController');
Route::resource('tarif', 'TarifkmController');
Route::resource('notakirim', 'NotakirimController');
Route::resource('pelanggan', 'PelangganController');
Route::resource('jenis', 'JenisController');
Route::resource('manifest', 'ManifestController');
Route::resource('jadwalpengiriman', 'JadwalpengirimanController');
Route::resource('rute', 'RuteController');
Route::resource('history', 'HistoryController');
Route::post('history/detail', 'HistoryController@detail');
Route::get('/autocomplete','HistoryController@autocomplete')->name('autocomplete');
Route::get('history/destroydetail/{id}', 'HistoryController@destroydetail');

// NOTA KIRIM
Route::get('nk/detail/{id}','NotakirimController@detail');
Route::get('notakirim/getpengirim/{id}','NotakirimController@pengirim');
Route::post('notakirim/updateDatalist','NotakirimController@updateDatalist');//BARU
Route::get('nk/print/{id}','NotakirimController@print');
Route::post('nk/tampilkelurahan','NotakirimController@tampilkelurahan');
Route::post('nk/tampilkecamatan','NotakirimController@tampilkecamatan');


// MANIFEST
Route::get('m/getnopolisi/{id}','ManifestController@nopolisi');
Route::get('manifest/detail/{id}','ManifestController@detail');
Route::get('m/print/{id}','ManifestController@print');

// activity kirim
Route::get('history/kirim/{id}', 'HistoryController@kirim');
Route::get('history/sampai/{id}', 'HistoryController@sampai');

// refisi manifest
Route::get('manifest/kirim/{id}', 'ManifestController@kirim');
Route::get('manifest/sampai/{id}', 'ManifestController@sampai');

