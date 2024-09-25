<?php

Route::group(['namespace' => 'User', 'prefix' => 'users'], function() {
    Route::post('/register', 'RegisterController')->name('register');
});

Route::group([ 'middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
