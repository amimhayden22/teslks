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
    return view('halamanlogin');
});

/* Halaman Awal */
Route::get('home', function () {
    return view('home');
});

/* CRUD Barang */
Route::group(['middleware' => ['auth']], function () {
    Route::post('createbarang', 'BarangController@InputBarang');
    Route::post('updatebarang', 'BarangController@UpdateBarang');
    Route::get('readbarang', 'BarangController@TampilBarang');
    Route::post('deletebarang', 'BarangController@HapusBarang');
});

/* CRUD Transaksi */
Route::group(['middleware' => ['auth']], function () {
Route::get('readtransaksi', 'TransaksiController@TampilTransaksi');
Route::post('createtransaksi', 'TransaksiController@InputTransaksi');
Route::post('updatetransaksi', 'TransaksiController@UpdateTransaksi');
Route::post('deletetransaksi', 'TransaksiController@Hapustransaksi');
Route::get('cetaklaporan', 'TransaksiController@CetakTransaksi');
});

/*Registrasi & Login */
// Route::get('registrasi', 'LoginController@Registrasi');
Route::post('daftar', 'LoginController@Daftar');
Route::get('masuk', 'LoginController@HalamanLogin')->name('login');
Route::post('login', 'LoginController@Login');
Route::get('logout', 'LoginController@Logout');