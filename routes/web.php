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
    return view('dashboard.index');
});

Route::get('/charts', function () {
    return view('dashboard.charts');
});

Route::get('/forms', function () {
    return view('dashboard.forms');
});

Route::get('/tables', function () {
    return view('dashboard.index');
});

Route::get('/creditos', function () {
    return view('dashboard.creditos');
});

Route::resource('produto', 'App\Http\Controllers\ProdutoController');
Route::resource('venda', 'App\Http\Controllers\VendaController');
Route::resource('dashboard', 'App\Http\Controllers\EstatisticaController');
Route::get('metricasGerais', 'App\Http\Controllers\ProdutoController@metricasGerais')->name('metricasGerais');
