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

use App\Http\Resources\ProductCollection;
use App\Product;

Route::get('/', function () {
    return redirect('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Users
Route::get('/user/create', 'UserController@create');
Route::post('/user/store', 'UserController@store');
Route::get('/user/list', 'UserController@index');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/update', 'UserController@update');
Route::get('/user/delete/{id}', 'UserController@destroy');

// Products
Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::get('/product/list', 'ProductController@index');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update', 'ProductController@update');
Route::get('product/delete/{id}', 'ProductController@destroy');
