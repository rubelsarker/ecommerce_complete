<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function() {
//    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});
