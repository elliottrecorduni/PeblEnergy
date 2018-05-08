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
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'PageController@index')->name('pages.index');
Route::get('/budget', 'PageController@budget')->name('pages.budget');
Route::get('/settings', 'PageController@settings')->name('pages.settings');

Route::resource('/device-categories', 'DeviceCategoryController');
Route::resource('/devices', 'DeviceController');
Route::post('/devices/pair', 'DeviceController@pair')->name('devices.pair');
Route::get('/scan', 'DeviceController@viewScan');
