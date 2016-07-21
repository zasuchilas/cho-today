<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/posts', 'PostController@index');
    Route::post('/post', 'PostController@store');
    Route::delete('/posts/{post}', 'PostController@destroy');

    Route::auth();
	// // Маршруты авторизации...
	// $this->get('login', 'Auth\AuthController@showLoginForm');
	// $this->post('login', 'Auth\AuthController@login');
	// $this->get('logout', 'Auth\AuthController@logout');
	// // Маршруты регистрации...
	// $this->get('register', 'Auth\AuthController@showRegistrationForm');
	// $this->post('register', 'Auth\AuthController@register');
	// // Маршруты сброса пароля...
	// $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	// $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	// $this->post('password/reset', 'Auth\PasswordController@reset');

});

Route::group(['prefix' => 'api', 'middleware' => 'auth:api'], function () {
	Route::resource('note', 'NoteController');
});
