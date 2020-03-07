<?php
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\WebsiteSetting;

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
    //contact
    Route::get(md5('contact'),'PagesController@contact')->name('contact');
    //shop
    Route::get(md5('shop'),'PagesController@shop')->name('shop');
    //product by brand
    Route::get('brand/{id}','ProductFilterController@productByBrand')->name('brand.products');
    //product by category
    Route::get('category/{id}','ProductFilterController@productByCategory')->name('category.products');
});
Route::get('/home', 'HomeController@index')->name('home');
//view composer
View::composer(['*'],function ($view){
    $setting = WebsiteSetting::firstOrFail();
    $cats = Category::all();
    $brands = Brand::all();
    $view->with(['setting' => $setting, 'cats' => $cats, 'brands' => $brands]);
});