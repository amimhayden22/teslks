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
    return view('welcome');
});

/* Halaman Awal */
Route::get('home', function () {
    return view('home');
});

/* CRUD Barang */
// Route::get('formbarang', function () {
//     return view('form_barang');
// });
Route::post('createbarang', 'BarangController@InputBarang');
Route::post('updatebarang', 'BarangController@UpdateBarang');
Route::get('readbarang', 'BarangController@TampilBarang');
Route::post('deletebarang', 'BarangController@HapusBarang');

/* CRUD Transaksi */
Route::get('readtransaksi', 'BarangController@TampilTransaksi');
Route::post('createtransaksi', 'BarangController@InputTransaksi');