<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function() {
    Route::resource('permission', 'PermissionController')->except(['destroy','show','edit','update']);
    Route::get('permission/delete/{id}', 'PermissionController@destroy')->name('permission.destroy');
});

