<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function() {
    //permission
    Route::resource('permission', 'PermissionController')->except(['destroy','show','edit','update']);
    Route::get('permission/delete/{id}', 'PermissionController@destroy')->name('permission.destroy');
    //category
    Route::resource('category', 'CategoryController')->except(['destroy']);
    Route::get('delete/category/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::get('active/category/{id}', 'CategoryController@active')->name('category.active');
    Route::get('inactive/category/{id}', 'CategoryController@inactive')->name('category.inactive');
    //subcategory
    Route::resource('subcategory', 'SubCategoryController')->except(['destroy']);
    Route::get('delete/subcategory/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');
    Route::get('active/subcategory/{id}', 'SubCategoryController@active')->name('subcategory.active');
    Route::get('inactive/subcategory/{id}', 'SubCategoryController@inactive')->name('subcategory.inactive');
    //sub-subcategory
    Route::resource('sub-subcategory', 'SubSubCategoryController')->except(['destroy']);
    Route::get('delete/sub-subcategory/{id}', 'SubSubCategoryController@destroy')->name('sub-subcategory.destroy');
    Route::get('active/sub-subcategory/{id}', 'SubSubCategoryController@active')->name('sub-subcategory.active');
    Route::get('inactive/sub-subcategory/{id}', 'SubSubCategoryController@inactive')->name('sub-subcategory.inactive');
    //Misc
    Route::get('get/subcategory/{id}', 'MiscController@getSubCat');

});

