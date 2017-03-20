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

Route::group(['middleware' => ['auth:api', 'roles']], function () {
//    REST-like product routes.
//    Route::get('/product', ['uses' => 'Api\ProductController@index']);
//    Route::put('/product', ['uses' => 'Api\ProductController@edit']);
//    Route::post('/product', ['uses' => 'Api\ProductController@create']);
//    Route::delete('/product', ['uses' => 'Api\ProductController@delete']);

    Route::get('/product/read', ['uses' => 'Api\ProductController@index', 'roles' => ['user', 'admin']]);
    Route::get('/product/edit', ['uses' => 'Api\ProductController@edit', 'roles' => ['admin']]);
    Route::get('/product/create', ['uses' => 'Api\ProductController@create', 'roles' => ['admin']]);
    Route::get('/product/delete', ['uses' => 'Api\ProductController@delete', 'roles' => ['admin']]);
});

// REST-like auth route.
//Route::put('/auth', ['uses' => 'Api\AuthController@login']);

Route::get('/auth/login', ['uses' => 'Api\AuthController@login']);