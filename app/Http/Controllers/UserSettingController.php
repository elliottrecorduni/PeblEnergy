<?php

namespace App\Http\Controllers;

use App\User;
use App\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function show(UserSetting $userSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSetting $userSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSetting $userSetting)
    {
        if (Auth::check()) {
            $userSetting = UserSetting::where('id', '=', Auth::user()->id)->first();

            if (!empty($userSetting)) {

                $userSetting->gas_budget = $request->gas_budget;
                $userSetting->water_budget = $request->water_budget;
                $userSetting->electricity_budget = $request->elec_budget;

                $userSetting->save();
            } else {

                $userSetting = new UserSetting();

                $userSetting->id = Auth::user()->id;
                $userSetting->gas_budget = $request->gas_budget;
                $userSetting->water_budget = $request->water_budget;
                $userSetting->electricity_budget = $request->elec_budget;

                $userSetting->save();
            }
        }

        return redirect()->route('pages.settings');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSetting  $userSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSetting $userSetting)
    {
        //
    }
}
