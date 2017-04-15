<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'book.auth'], function() {


    Route::post('/search', 'BookController@search');
    Route::resource('book', 'BookController');
    Route::get('/testing', 'BookController@customAjax');


});

Route::get('auth/google', 'Auth\RegisterController@redirectToProvider')->name('google.login');
Route::get('auth/google/callback', 'Auth\RegisterController@handleProviderCallback');