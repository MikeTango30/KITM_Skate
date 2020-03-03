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
Route::get('/product/delete/{product}', 'ProductController@remove');

Route::get('/categories', 'CategoryController@show');
Route::get('/category/add', 'CategoryController@showAddForm');
Route::post('/category/store', 'CategoryController@store');
Route::get('/category/update/form/{category}', 'CategoryController@showUpdateForm');
Route::post('/category/update/{category}', 'CategoryController@update');
Route::get('/category/delete/{category}', 'CategoryController@destroy');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
