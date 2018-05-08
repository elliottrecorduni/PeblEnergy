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

Route::get('/', 'PageController@index')->name('page.index');
Route::get('/budget', 'PageController@budget')->name('page.budget');
Route::get('/settings', 'PageController@settings')->name('page.settings');
Route::post('/settings/update', 'UserSettingController@update')->name('settings.update');

Route::resource('/device-categories', 'DeviceCategoryController');
Route::put('/user/changepassword/{id}', 'UserController@changePassword')->name('user.changePassword');
Route::resource('/user', 'UserController', ['except' => ['create', 'index', 'store', 'destroy']]);
Route::resource('/devices', 'DeviceController');
Route::post('/devices/pair', 'DeviceController@pair')->name('devices.pair');
Route::get('/scan', 'DeviceController@viewScan');


Route::resource('categories', 'CategoryController', ['except' => ['create']]);
