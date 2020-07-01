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
 // первая страница
Route::get('/', 'ProductController@index')->name('home');

Route::group(['prefix' => '', 'middleware' => 'auth'], function(){
    // все товары после авторизации
    Route::get('/home', 'ProductController@index')->name('home');
    // страница категории
    Route::get('/category/{id}', 'ProductController@category')->name('category');
    // страница товара
    Route::get('/product/{id}', 'ProductController@product')->name('product');
    // перенаправление по кнопке "купить"
    Route::get('/buy/{id}', 'ProductController@buy')->name('buy');
    // сабмит заказа
    Route::post('/order', 'OrderController@order')->name('order');
    // просмотр заказов
    Route::get('/orders', 'ProductController@admin')->name('orders');
});
