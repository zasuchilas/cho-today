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

Route::get('/posts', 'PostController@index');
Route::post('/post', 'PostController@store');
Route::delete('/posts/{post}', 'PostController@destroy');

Route::auth();

// // Маршруты аутентификации...
// Route::get('/login', 'Auth\AuthController@getLogin');
// Route::post('/login', 'Auth\AuthController@postLogin');
// Route::get('/logout', 'Auth\AuthController@getLogout');

// // Маршруты регистрации...
// Route::get('/register', 'Auth\AuthController@getRegister');
// Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/', function () {
    return view('welcome');
});
