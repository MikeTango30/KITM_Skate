<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', 'ApiController');
Route::get('product/{product}', 'ApiController@showById');
Route::apiResource('categories', 'ApiCategoriesController');
Route::get('/products/category/{category}', 'ApiController@showByCategory');
//Route::apiResource('products/category', 'ApiController');
//Route::post('/order/{order}', 'OrderController@store');
