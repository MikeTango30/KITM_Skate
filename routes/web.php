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

//Route::get('/', 'HomeController@index');


Route::get('/', 'ProductController@show');
Route::get('/orders', 'OrderController@show');

Route::get('/product/add', 'ProductController@showAddForm');
Route::post('/product/store', 'ProductController@store');
Route::get('/product/update/form/{product}', 'ProductController@showUpdateForm');
Route::post('/product/update/{product}', 'ProductController@update');
Route::get('/product/delete/{product}', 'ProductController@destroy');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
