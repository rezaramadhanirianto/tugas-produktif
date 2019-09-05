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
Route::get('/', function ()
{
    return view('home');
});
Route::resource('products','ProductController');
Route::get('goods', 'goodsController@index')->name('home');
Route::post('goods/add', 'goodsController@add');
Route::get('goods/delete/{id}', 'goodsController@delete');
Route::get('goods/edit/{id}', 'goodsController@editData');

