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
    //brand
    Route::resource('brand', 'BrandController')->except(['destroy']);
    Route::get('delete/brand/{id}', 'BrandController@destroy')->name('brand.destroy');
    Route::get('active/brand/{id}', 'BrandController@active')->name('brand.active');
    Route::get('inactive/brand/{id}', 'BrandController@inactive')->name('brand.inactive');
    //color
    Route::resource('color', 'ColorController')->except(['destroy']);
    Route::get('delete/color/{id}', 'ColorController@destroy')->name('color.destroy');
    Route::get('active/color/{id}', 'ColorController@active')->name('color.active');
    Route::get('inactive/color/{id}', 'ColorController@inactive')->name('color.inactive');
    //unit
    Route::resource('unit', 'UnitController')->except(['destroy']);
    Route::get('delete/unit/{id}', 'UnitController@destroy')->name('unit.destroy');
    Route::get('active/unit/{id}', 'UnitController@active')->name('unit.active');
    Route::get('inactive/unit/{id}', 'UnitController@inactive')->name('unit.inactive');
    //size
    Route::resource('size', 'SizeController')->except(['destroy']);
    Route::get('delete/size/{id}', 'SizeController@destroy')->name('size.destroy');
    Route::get('active/size/{id}', 'SizeController@active')->name('size.active');
    Route::get('inactive/size/{id}', 'SizeController@inactive')->name('size.inactive');
    //size
    Route::resource('product', 'ProductController')->except(['destroy']);
    Route::get('delete/product/{id}', 'ProductController@destroy')->name('product.destroy');
    Route::get('active/product/{id}', 'ProductController@active')->name('product.active');
    Route::get('inactive/product/{id}', 'ProductController@inactive')->name('product.inactive');
    //Misc
    Route::get('get/subcategory/{id}', 'MiscController@getSubCat');
    Route::get('get/sub-subcategory/{id}', 'MiscController@getSubSubCat');

});

