<?php
use App\Model\Admin\Brand;
use App\Model\Admin\Category;

Auth::routes();
Route::group(['namespace'=>'User'], function(){
    Route::get('/', 'WelcomeController@index');
    Route::get('product/{product}', 'WelcomeController@productDetails')->name('product.details');
});
Route::get('/home', 'HomeController@index')->name('home');
View::composer(['user.partial._header','user.partial._brand'],function ($view){
    $cats = Category::all();
    $brands = Brand::all();
    $view->with(['cats' => $cats, 'brands' => $brands]);
});