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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', ['as' => 'index', 'uses' => 'Controller@index']);

Route::post('verificacion', ['as' => 'verificacion', 'uses' => 'ControlEncuestadoController@verificacion']);

Route::resource('preguntas', 'PreguntasController');
Route::get('preguntas/{cedula}/{primer_nombre}/{segundo_nombre}/{primer_apellido}/{segundo_apellido}/{fecha_nacimiento}/{genero}', ['as' => 'preguntas', 'uses' => 'PreguntasController@preguntas']);
//Route::resource('encuestado', 'ControlEncuestadoController');
