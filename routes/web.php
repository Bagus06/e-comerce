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
Route::get('/home', 'ProductController@getHome')->name('home');

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
	Route::get('/detailPay/{token}', 'ProductController@detailPay')->name('detailPay');
	Route::get('/getCheck/{token}', 'ProductController@getCheck')->name('getCheck');
	Route::post('/checkout/{token}', 'ProductController@postCheckout')->name('checkout');
	Route::post('/check', 'ProductController@postCheck')->name('postCheck');
	Route::get('/yourProduct', 'ProductController@yourProduct')->name('yourProduct');
	Route::post('/postProduct', 'ProductController@postProduct')->name('postProduct');
	Route::get('/cencelCheck/{id}', 'ProductController@cencelCheck')->name('cencelCheck');
	Route::get('/cencelBuy/{id}', 'ProductController@cencelBuy')->name('cencelBuy');
	Route::get('/toPay', 'ProductController@toPay')->name('toPay');
	Route::get('/memberProfil', 'ProfilController@memberProfil')->name('memberProfil');
	Route::post('/memberProfilPost', 'ProfilController@postProfil')->name('postProfil');
});
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.getAddToCart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/cartCheck/{id}', 'ProductController@cartCheck')->name('cartCheck');
Route::get('/delete/{id}', 'ProductController@deleteCart')->name('delete');

Route::get('/reduceOne/{id}', [
	'uses' => 'ProductController@kurang',
	'as' => 'reduceOne'
]);
Route::get('/addOne/{id}', [
	'uses' => 'ProductController@tambah',
	'as' => 'addOne'
]);

Route::get('/addItem/{id}', 'ProductController@addItem')->name('addItem');

Route::get('/coba', function(){
	return view('shop.profil');
});