<?php

use App\Device;
use App\EnergyUsage;
use Carbon\Carbon;
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

Route::post('/submit', function (Request $request) {

    $device = Device::where('mac_address', $request->mac_address)->first();

    $energy_usage = new EnergyUsage();

    $energy_usage->device_id = $device->id;
    $energy_usage->start_time = $request->start_time;
    $energy_usage->end_time = $request->end_time;
    $energy_usage->kw_usage = $request->kw_usage;

    $energy_usage->save();

});

Route::get('/data', 'DataController@data');

Route::get('/test', function (){

    $timeframe = 'week';
    $category = \App\DeviceCategory::where('id', 1)->first();

    global $start_date;
    global $end_date;

    $data_points = [];

    switch ($timeframe){
        case 'day':
//            $data_points = 1;
            $start_date = Carbon::now()->startOfDay();
            $end_date = Carbon::now()->endOfDay();
            break;

        case 'week':
//            $data_points = 7;
            $start_date = Carbon::now()->startOfWeek();
            $end_date = Carbon::now()->endOfWeek();
            break;

        case 'month':
//            $data_points = 31;
            $start_date = Carbon::now()->startOfMonth();
            $end_date = Carbon::now()->endOfMonth();
            break;
    }

    $devices = $category->devices()->get();


    $count  = [];

    //Init interval
    $dateInterval = \DateInterval::createFromDateString('1 day');
    //Init Date Period from start date to end date
    //1 day is added to end date since date period ends before end date. See first comment: http://php.net/manual/en/class.dateperiod.php
    $dateperiod = new \DatePeriod($start_date, $dateInterval, $end_date);

    foreach($dateperiod as $day){
        array_push($count, []);
    }

    foreach($devices as $device){

        $usagesInRange = $device->energy_usages()->whereBetween('start_time', [$start_date, $end_date])->get();

        foreach ($usagesInRange as $usage){

            $carbon = Carbon::parse($usage->start_time);

//            array_push($count, [1]);


//                if ($carbon->isMonday()){
//                    $monday += $usage->kw_usage;
//                }
//
//                if ($carbon->isTuesday()){
//                    $tuesday += $usage->kw_usage;
//                }
//
//                if ($carbon->isWednesday()){
//                    $wednesday += $usage->kw_usage;
//                }
//
//                if ($carbon->isThursday()){
//                    $thursday += $usage->kw_usage;
//                }
//
//                if ($carbon->isFriday()){
//                    $friday += $usage->kw_usage;
//                }
//
//                if ($carbon->isSaturday()){
//                    $saturday += $usage->kw_usage;
//                }
//
//                if ($carbon->isSunday()){
//                    $sunday += $usage->kw_usage;
//                }
        }
    }

//    $data = array($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);

    return dd($count);
});

