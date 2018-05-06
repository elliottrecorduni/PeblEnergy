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


Auth::routes();

Route::get('/', 'PageController@index')->name('page.index');
Route::get('/budget', 'PageController@budget')->name('page.budget');
Route::get('/settings', 'PageController@settings')->name('page.settings');

Route::resource('/devices', 'DeviceController');
Route::resource('/device-categories', 'DeviceCategoryController');
