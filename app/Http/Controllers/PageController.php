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

    public function index(){

        $devices = Device::all();

        if(Auth::check()){
            $userSetting = UserSetting::where('id', '=', Auth::user()->id)->first();
        }

        $waterTotalKw = DeviceCategory::where('name', 'Water')->first()->total_kw;

        return view('pages.index', compact('devices', 'userSetting', 'waterTotalKw'));
    }

    public function budget() {

        $userSetting = UserSetting::first();
        return view('pages.budget', compact('userSetting'));
    }

    public function settings() {

        $userSetting = UserSetting::where('id', '=', Auth::user()->id)->first();
        return view('pages.settings', compact('userSetting'));
    }
}
