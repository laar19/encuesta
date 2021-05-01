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

// Register
Route::get('/', ['as' => 'index', 'uses' => 'Controller@index']);
Route::post('verificacion', ['as' => 'verificacion', 'uses' => 'ControlEncuestadoController@verificacion']);
Route::post('registro', ['as' => 'registro', 'uses' => 'ControlEncuestadoController@registro']);
Route::get('preguntas/{cedula}/{primer_nombre}/{segundo_nombre}/{primer_apellido}/{segundo_apellido}/{fecha_nacimiento}/{genero}', ['as' => 'preguntas', 'uses' => 'PreguntasController@preguntas']);
Route::post('preguntas_store', ['as' => 'preguntas_store', 'uses' => 'PreguntasController@store']);

// Admin
Route::get('admin', ['as' => 'admin', 'uses' => 'ControlEncuestaController@index']);
Route::get('open', ['as' => 'open', 'uses' => 'ControlEncuestaController@open']);
Route::post('store_quest', ['as' => 'store_quest', 'uses' => 'ControlEncuestaController@store_quest']);
Route::post('close_quest', ['as' => 'close_quest', 'uses' => 'ControlEncuestaController@close_quest']);
Route::get('stats', ['as' => 'stats', 'uses' => 'ControlEncuestaController@stats']);
Route::get('search_stats', ['as' => 'search_stats', 'uses' => 'ControlEncuestaController@search']);
Route::get('show_stats', ['as' => 'show_stats', 'uses' => 'ControlEncuestaController@show_stats']);

// Login
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::post('checklogin', ['as' => 'checklogin', 'uses' => 'LoginController@checklogin']);
Route::get('successlogin', ['as' => 'successlogin', 'uses' => 'LoginController@successlogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

// Users
Route::resource('user', 'UserController');
Route::get('search_user', ['as' => 'search_user', 'uses' => 'UserController@search']);

Route::get('closed', ['as' => 'closed', 'uses' => 'ErrorController@closed']);
