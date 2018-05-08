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

    if ($request->api_token == $device->api_token){

        $energy_usage = new EnergyUsage();

        $energy_usage->device_id = $device->id;
        $energy_usage->start_time = $request->start_time;
        $energy_usage->end_time = $request->end_time;
        $energy_usage->kw_usage = $request->kw_usage;

        $energy_usage->save();
    }else{
//        return http_response_code(401);
        return Response::json(array(
            'error' => true,
            'msg' => 'Wrong API Token'
        ), 401);
    }

});

Route::get('/data/category/{category_name}/{time_frame}', 'DataController@category');
Route::get('/data/device/{device_mac}/{time_frame}', 'DataController@device');

