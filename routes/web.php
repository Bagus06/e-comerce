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

Route::get('/shop', 'ProductController@getIndex')->name('product.index');
Route::get('/', 'ProductController@getHome')->name('home');

Auth::routes();
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.getAddToCart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::group(['middleware' => 'auth'], function(){
	Route::get('/checkout/{id}', 'ProductController@getCheckout')->name('checkout');
	Route::get('/toPay', 'ProductController@toPay')->name('toPay');
	Route::post('/checkout', 'ProductController@postCheckout')->name('checkout');
	Route::post('/check/{id}', 'ProductController@postCheck')->name('check');
});
