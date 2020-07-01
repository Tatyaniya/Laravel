<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'ProductController@index')->name('home');

Route::group(['prefix' => '', 'middleware' => 'auth'], function(){
    Route::get('/home', 'ProductController@index')->name('home');
    Route::get('/category/{id}', 'HomeController@category')->name('category');
    Route::get('/buy', 'OrderController@buy')->name('buy');
    Route::get('/orders', 'OrderController@orders')->name('orders');
});
