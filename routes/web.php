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
Route::group(['middleware' => 'auth'], function(){
	Route::get('/detailPay/{token}', 'ProductController@detailPay')->name('detailPay');
	Route::get('/getCheck/{token}', 'ProductController@getCheck')->name('getCheck');
	Route::post('/checkout/{token}', 'ProductController@postCheckout')->name('checkout');
	Route::post('/check', 'ProductController@postCheck')->name('postCheck');
	Route::get('/toPay', 'ProductController@toPay')->name('toPay');
});
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.getAddToCart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/cartCheck/{id}', 'ProductController@cartCheck')->name('cartCheck');
Route::get('/delete/{id}', 'ProductController@deleteCart')->name('delete');

Route::get('/removeItem/{id}', 'ProductController@removeItem')->name('removeItem');
Route::get('/addItem/{id}', 'ProductController@addItem')->name('addItem');
