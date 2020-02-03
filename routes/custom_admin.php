<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function() {
    Route::get('/layout', 'HomeController@layout')->name('layout');
});
