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
    Route::get('/orders', 'OrderController@orders')->name('orders');

    // добавление товара
    Route::get('/create', 'ProductController@create')->name('create');
    Route::post('/add', 'ProductController@add')->name('add');
    // редактирование товара
    Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
    Route::post('/save/{id}', 'ProductController@save')->name('save');
    // удаление товара
    Route::get('delete/{id}', 'ProductController@delete')->name('delete');

    // просмотр категории
    Route::get('/catlist', 'CategoryController@catList')->name('catlist');
    // добавление категории
    Route::get('/createcat', 'CategoryController@create')->name('createcat');
    Route::post('/addcat', 'CategoryController@add')->name('addcat');
    // редактирование категории
    Route::get('/editcat/{id}', 'CategoryController@edit')->name('editcat');
    Route::post('/savecat/{id}', 'CategoryController@save')->name('savecat');
    // удаление категории
    Route::get('deletecat/{id}', 'CategoryController@delete')->name('deletecat');

    Route::get('send', 'MailController@send')->name('send');
});
