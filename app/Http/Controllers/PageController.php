<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceCategory;
use App\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {

        $devices = Device::all();


        $userSetting = UserSetting::first();

        $electricityTotalPrice = DeviceCategory::where('name', 'Electricity')->first()->total_price_current_month;
        $waterTotalPrice = DeviceCategory::where('name', 'Water')->first()->total_price_current_month;
        $gasTotalPrice = DeviceCategory::where('name', 'Gas')->first()->total_price_current_month;

        $totalMonthPrice = DeviceCategory::getTotalPriceCurrentMonthGroupAttribute(['Electricity', 'Water', 'Gas']);


        return view('pages.index', compact('devices', 'userSetting', 'electricityTotalPrice', 'waterTotalPrice', 'gasTotalPrice', 'totalMonthPrice'));
    }

    public function budget()
    {
        $userSetting = UserSetting::first();

        $electricityTotalPrice = DeviceCategory::where('name', 'Electricity')->first()->total_price_current_month;
        $waterTotalPrice = DeviceCategory::where('name', 'Water')->first()->total_price_current_month;
        $gasTotalPrice = DeviceCategory::where('name', 'Gas')->first()->total_price_current_month;

        return view('pages.budget', compact('userSetting', 'electricityTotalPrice', 'waterTotalPrice', 'gasTotalPrice'));
    }

    public function settings()
    {

        $userSetting = UserSetting::first();
        return view('pages.settings', compact('userSetting'));
    }
}
