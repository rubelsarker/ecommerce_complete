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


Auth::routes();
Route::group(['namespace'=>'User'], function(){
    Route::get('/', 'WelcomeController@index');
    Route::get('product/{slug}', 'WelcomeController@productDetails')->name('product.details');
});

Route::get('/home', 'HomeController@index')->name('home');

