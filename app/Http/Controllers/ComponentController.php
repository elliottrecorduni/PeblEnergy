<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceCategory;
use App\ScanDevice;
use App\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComponentController extends Controller
{
    public function monthlyBudget()
    {
        $userSetting = UserSetting::first();

        $electricityTotalPrice = DeviceCategory::where('name', 'Electricity')->first()->total_price_current_month;
        $waterTotalPrice = DeviceCategory::where('name', 'Water')->first()->total_price_current_month;
        $gasTotalPrice = DeviceCategory::where('name', 'Gas')->first()->total_price_current_month;

        $totalMonthPrice = DeviceCategory::getTotalPriceCurrentMonthGroupAttribute(['Electricity', 'Water', 'Gas']);


        return view('components.monthly-budget', compact('devices', 'userSetting', 'electricityTotalPrice', 'waterTotalPrice', 'gasTotalPrice', 'totalMonthPrice'));

    }

    public function realTimeDatausage(){
        $electricityUsageRate = DeviceCategory::where('name', 'Electricity')->first()->usage_rate_10_seconds;
        $waterUsageRate = DeviceCategory::where('name', 'Water')->first()->usage_rate_10_seconds;
        $gasUsageRate = DeviceCategory::where('name', 'Gas')->first()->usage_rate_10_seconds;

        return view('components.real-time-data-usage', compact('electricityUsageRate', 'waterUsageRate', 'gasUsageRate'));
    }

    public function activeDevices(){
        $devices = Device::all();
        return view('components.active-devices', compact('devices'));
    }

    public function scan(){
        $allScans = ScanDevice::all();
        return view('components.scan', compact('allScans'));
    }
}
