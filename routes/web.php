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

Route::get('/', ['as' => 'index', 'uses' => 'Controller@index']);

Route::post('verificacion', ['as' => 'verificacion', 'uses' => 'ControlEncuestadoController@verificacion']);
Route::post('registro', ['as' => 'registro', 'uses' => 'ControlEncuestadoController@registro']);

Route::resource('preguntas', 'PreguntasController');
Route::get('preguntas/{cedula}/{primer_nombre}/{segundo_nombre}/{primer_apellido}/{segundo_apellido}/{fecha_nacimiento}/{genero}', ['as' => 'preguntas', 'uses' => 'PreguntasController@preguntas']);

Route::get('admin', ['as' => 'admin', 'uses' => 'ControlEncuestaController@index']);

//Route::resource('stats', 'ControlEncuestaController');
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'ControlEncuestaController@dashboard']);
Route::post('store_quest', ['as' => 'store_quest', 'uses' => 'ControlEncuestaController@store_quest']);
Route::post('close_quest', ['as' => 'close_quest', 'uses' => 'ControlEncuestaController@close_quest']);
Route::get('stats', ['as' => 'stats', 'uses' => 'ControlEncuestaController@stats']);
