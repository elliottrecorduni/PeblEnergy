<?php

namespace App\Http\Controllers;

use App\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.index');
    }

    public function budget() {
        return view('pages.budget');
    }

    public function settings() {

        $userSetting = UserSetting::where('id', '=', Auth::user()->id)->first();
        return view('pages.settings', compact('userSetting'));
    }
}
