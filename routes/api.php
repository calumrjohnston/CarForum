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

Route::get('brands', 'BrandController@apiIndex')->name('api.brands.index');

Route::post('brands', 'BrandController@apiStore')->name('api.brands.store');

//Route::get('modelCars/{modelCar}/comments','CommentController@index');

//Route::middleware('auth:api')->group(function () {
//    Route::post('modelCars/{modelCar}/comment','CommentController@store');
//});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
