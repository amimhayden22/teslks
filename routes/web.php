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

/* CRUD Barang */
Route::get('formbarang', function () {
    return view('form_barang');
});
Route::post('createbarang', 'BarangController@InputBarang');
Route::get('readbarang', 'BarangController@TampilBarang');