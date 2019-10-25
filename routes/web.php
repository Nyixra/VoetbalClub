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

Auth::routes();

Route::get('/', 'HomeController@index')->name('clubs');

Route::get('/{name}', 'ClubInfoController@index');
Route::get('/{name}/add', 'ClubInfoController@create');
Route::post('/{name}/store', 'ClubInfoController@store');
Route::get('/{name}/{id}/delete', 'ClubInfoController@destroy');
