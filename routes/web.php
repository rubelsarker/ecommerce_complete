<?php
use App\Model\Admin\Brand;
use App\Model\Admin\Category;

Auth::routes();
Route::group(['namespace'=>'User'], function(){
    //home
    Route::get('/', 'WelcomeController@index');
    //product details
    Route::get('product/{product}', 'WelcomeController@productDetails')->name('product.details');
    //cart
    Route::get('add-to-cart/{id}', 'CartController@addToCart');
    Route::get('cart', 'CartController@cart')->name('cart');
    Route::patch('update-cart', 'CartController@update');
    Route::delete('remove-from-cart', 'CartController@remove');
    Route::get('cancel-cart', 'CartController@cancel');
});
Route::get('/home', 'HomeController@index')->name('home');
//view composer
View::composer(['user.partial._header','user.partial._brand'],function ($view){
    $cats = Category::all();
    $brands = Brand::all();
    $view->with(['cats' => $cats, 'brands' => $brands]);
});