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

Route::get('/', 'ProductController@getIndex')->name('product.index');

Auth::routes();

Route::get('/home', 'ProductController@getIndex')->name('product.index');

Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.getAddToCart');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
