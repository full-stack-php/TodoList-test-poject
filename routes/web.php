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


use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group([ 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/to_day', 'IndexController@toDay')->name('today');
    Route::get('/completed', 'IndexController@completed')->name('completed');
    Route::get('/categories', 'IndexController@categories')->name('categories');
    Route::get('/flags', 'IndexController@flags')->name('flags');
    Route::get('exit', 'Auth\LoginController@getLogout')->name('logout_user');
});