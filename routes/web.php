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

Route::get('/', function () {

    global $t1;
    $t1= [];

    $category = \App\DeviceCategory::all()->first();

    $devices = $category->devices()->get();

    foreach($devices as $device){
        foreach($device->energy_usages as $usages){

            //Combine all data, 1 for monday, 1 for tuesday etc.

            $usagesInRange = $usages->whereBetween('start_time', [\Carbon\Carbon::now()->startOfWeek()->, \Carbon\Carbon::now()->endOfWeek()])->get();
            foreach ($usagesInRange as $usage){
                if ($usage->)
                array_push($t1, [$usage->kw_usage, $usage->start_time, $usage->end_time]);
            }
        }
    }



    return view('pages.index', compact('t1'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/device-categories', 'DeviceCategoryController');
Route::resource('/devices', 'DeviceController');
