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


Route::get('/', 'PagesController@index');

Route::get('entrada_page', 'PagesController@entrada');

Route::get('carros_page', 'PagesController@carros');

Route::get('clientes_page', 'PagesController@clientes');

Route::get('saida_page', 'PagesController@saida');

Route::post('select', 'PostController@selectClient');

Route::post('insert', 'PostController@insertClient');

Route::post('update', 'PostController@update');

Route::post('destroy', 'PostController@destroy');

Route::get('edit/{id}', 'PostController@edit');

Route::get('editcar/{id}', 'PostController@editcar');

Route::post('updatecar', 'PostController@updatecar');

Route::post('destroycar', 'PostController@destroycar');

Route::post('selectcar', 'PostController@selectcar');