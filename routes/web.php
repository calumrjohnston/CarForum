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
use App\ModelCar;
use App\Twitter;

app()->singleton('App\Twitter', function($app){
  return new Twitter('secret key');
});



Route::get('exampleRoute', 'ModelCarController@exampleMethod');

Route::get('/', function(){
  return view ('welcome');
});

//Route::post('/modelCars/{modelCars}', 'CommentController@create')
//  ->name('comments.create')->middleware('auth');

//Route::delete('/modelCars/modelCars/{comment}', 'CommentController@destroy')
//  ->name('comments.destroy')->middleware('auth');

//Route::get('/modelCars/comment/{comment}', 'CommentController@edit')
//  ->name('comments.edit')->middleware('auth');

//Route::put('/modelCars/comment/{comment}', 'CommentController@update')
//  ->name('comments.update')->middleware('auth');
Route::prefix('admin')->group(function(){

  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::delete('/', 'AdminController@destroy')->name('admin.destroy');

});

Route::post('modelCars/comment', 'CommentController@store')
  ->name('comment.store')->middleware('auth');

Route::get('modelCars/comment/{id}', 'CommentController@edit')
  ->name('comment.edit')->middleware('auth');

Route::put('modelCars/comment/{id}/update', 'CommentController@update')
  ->name('comment.update')->middleware('auth');

Route::get('modelCars', 'ModelCarController@index')
  ->name('modelCars.index')->middleware('auth');

Route::get('modelCars/create', 'ModelCarController@create')
  ->name('modelCars.create')->middleware('auth');

Route::post('modelCars', 'ModelCarController@store')
  ->name('modelCars.store')->middleware('auth');

Route::get('modelCars/{modelCar}', 'ModelCarController@show')
  ->name('modelCars.show')->middleware('auth');

Route::delete('modelCars/{modelCar}', 'ModelCarController@destroy')
  ->name('modelCars.destroy')->middleware('auth');

Route::get('/brands', 'BrandController@page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
