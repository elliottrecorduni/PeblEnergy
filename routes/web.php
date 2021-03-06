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
Route::post('/settings/update', 'UserSettingController@update')->name('settings.update');

Route::resource('/device-categories', 'DeviceCategoryController');
Route::put('/user/changepassword/{id}', 'UserController@changePassword')->name('user.changePassword');
Route::resource('/user', 'UserController', ['except' => ['create', 'index', 'store', 'destroy']]);
Route::resource('/devices', 'DeviceController');
Route::get('/scan', 'DeviceController@viewScan')->name('pages.scan');


Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::get('components/monthly-budget', 'ComponentController@monthlyBudget')->name('components.monthly-budget');
Route::get('components/real-time-data-usage', 'ComponentController@realTimeDataUsage')->name('components.real-time-data-usage');
Route::get('components/active-devices', 'ComponentController@activeDevices')->name('components.active-devices');
Route::get('components/scan', 'ComponentController@scan')->name('components.scan');