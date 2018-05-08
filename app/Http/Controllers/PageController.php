<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){

        $devices = Device::all();

        return view('pages.index', compact('devices'));
    }

    public function budget() {
        return view('pages.budget');
    }

    public function settings() {
        return view('pages.settings');
    }
}
