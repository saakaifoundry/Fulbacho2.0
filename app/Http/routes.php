<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('home','HomeController@index');
Route::get('/app','HomeController@app');
Route::resource('/partidos','PartidoController');
Route::resource('/contactos','ContactosController');


/*
*Maneja el login, logout y registro
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
