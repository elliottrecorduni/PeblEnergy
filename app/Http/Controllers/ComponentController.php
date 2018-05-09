<?php

namespace App\Http\Controllers;

use App\DeviceCategory;
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
}
