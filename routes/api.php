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

Route::get('/users', 'UserController@index');
Route::get('/posts', 'PostController@index');
Route::get('/categories', 'CategoryController@index');
Route::get('/subcategories', 'SubcategoryController@index');
Route::get('/search', 'CategoryController@search');
Route::post('/follow', 'UserController@follow');
Route::post('/unfollow', 'UserController@unfollow');
