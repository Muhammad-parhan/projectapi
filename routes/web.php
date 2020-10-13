<?php

use Illuminate\Support\Facades\Route;

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
    return view('main');
});
Route::get('kategori','kategorictrl@index');
Route::get('kategori/add','kategorictrl@create');
Route::post('kategori/addp','kategorictrl@store');
Route::get('kategori/edit/{id}','kategorictrl@show');
Route::post('kategori/{id}','kategorictrl@edit');
Route::delete('kategori/{id}','kategorictrl@destroy');


Route::get('produk','produkctrl@index');
Route::get('produk/add','produkctrl@create');
Route::post('produk/addp','produkctrl@store');
Route::get('produk/edit/{id}','produkctrl@show');
Route::post('produk/{id}','produkctrl@edit');
Route::delete('produk/{id}','produkctrl@destroy');