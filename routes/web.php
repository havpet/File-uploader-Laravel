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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::post('/register', 'HomeController@redirect');
Route::get('/register', 'HomeController@redirect');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/store', 'StoreController@store');
Route::get('/download/{hash}', 'StoreController@download');
