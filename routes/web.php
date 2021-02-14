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

Route::get('/', 'App\Http\Controllers\KategorijeController@all');
Route::get('/{kategorija}', 'App\Http\Controllers\KategorijeController@view');
Route::get('/{kategorija}/{proizvod}', 'App\Http\Controllers\ProizvodController@view');
Route::post('/dodaj', 'App\Http\Controllers\ProizvodController@create');
