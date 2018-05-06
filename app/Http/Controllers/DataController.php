<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data(){

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
            $usagesInRange = $device->energy_usages()->whereBetween('start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

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

        return $data;
    }
}
