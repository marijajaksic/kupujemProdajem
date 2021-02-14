<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('kategorije', 'App\Http\Controllers\KategorijeController@getAll');
Route::get('kategorije/{id}', 'App\Http\Controllers\KategorijeController@getById');
Route::get('proizvodi', 'App\Http\Controllers\ProizvodController@getAll');
Route::get('proizvodi/{id}', 'App\Http\Controllers\ProizvodController@getById');
Route::post('kategorije', 'App\Http\Controllers\KategorijeController@save');
Route::post('proizvodi', 'App\Http\Controllers\ProizvodController@save');
Route::delete('kategorije/{id}', 'App\Http\Controllers\KategorijeController@delete');
Route::delete('proizvodi/{id}', 'App\Http\Controllers\ProizvodController@delete');
