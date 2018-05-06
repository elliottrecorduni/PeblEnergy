<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EnergyUsage extends Model
{
    protected $table = 'energy_usages';

    public function categoryUsage($category, $timeframe='week'){

        global $start_date;
        global $end_date;

        $data_points = null;

        switch ($timeframe){
            case 'day':
                $data_points = 1;
                $start_date = Carbon::now()->startOfDay();
                $end_date = Carbon::now()->endOfDay();

            case 'week':
                $data_points = 7;
                $start_date = Carbon::now()->startOfWeek();
                $end_date = Carbon::now()->endOfWeek();

            case 'month':
                $data_points = 31;
                $start_date = Carbon::now()->startOfMonth();
                $end_date = Carbon::now()->endOfMonth();
        }

        $devices = $category->devices()->get();

        foreach($devices as $device){

            $usagesInRange = $device->energy_usages()->whereBetween('start_time', [$start_date, $end_date])->get();

            //Init interval
            $dateInterval = \DateInterval::createFromDateString('1 day');
            //Init Date Period from start date to end date
            //1 day is added to end date since date period ends before end date. See first comment: http://php.net/manual/en/class.dateperiod.php
            $dateperiod = new \DatePeriod($start_date, $dateInterval, $end_date);

            foreach ($usagesInRange as $usage){

                $carbon = Carbon::parse($usage->start_time);

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

        $data = array($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);

        return $data;
    }
}
