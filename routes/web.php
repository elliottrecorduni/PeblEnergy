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

use Carbon\Carbon;

Route::get('/', function () {

    $monday = 0;
    $tuesday = 0;
    $wednesday = 0;
    $thursday = 0;
    $friday = 0;
    $saturday = 0;
    $sunday = 0;

    $category = \App\DeviceCategory::all()->first();
    $devices = $category->devices()->get();

    foreach($devices as $device){
        $usagesInRange = $device->energy_usages()->whereBetween('start_time', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get();

        foreach ($usagesInRange as $usage){

            $carbon = Carbon::parse($usage->start_time);

            if ($carbon->isMonday()){
                $monday += $usage->kw_usage;
            }

            if ($carbon->isTuesday()){
                $tuesday += $usage->kw_usage;
            }

            if ($carbon->isWednesday()){
                $wednesday += $usage->kw_usage;
            }

            if ($carbon->isThursday()){
                $thursday += $usage->kw_usage;
            }

            if ($carbon->isFriday()){
                $friday += $usage->kw_usage;
            }

            if ($carbon->isSaturday()){
                $saturday += $usage->kw_usage;
            }

            if ($carbon->isSunday()){
                $sunday += $usage->kw_usage;
            }
        }
    }

    $data = array($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);


    return view('pages.index', compact('data'));
})->name('pages.index');;

Auth::routes();

//Route::get('/', 'PageController@index')->name('pages.index');
Route::get('/budget', 'PageController@budget')->name('pages.budget');
Route::get('/settings', 'PageController@settings')->name('pages.settings');

Route::resource('/device-categories', 'DeviceCategoryController');
Route::resource('/devices', 'DeviceController');
