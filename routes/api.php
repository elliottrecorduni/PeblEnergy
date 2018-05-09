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

Route::post('/scan', 'DeviceController@scan');
Route::post('/submit', 'DeviceController@submit');

Route::get('/data/category/{category_name}/{time_frame}', 'DataController@category');
Route::get('/data/device/{device_mac}/{time_frame}', 'DataController@device');
Route::get('export/{type}/{name}', 'DataController@exportCollection')->name('data.export');

