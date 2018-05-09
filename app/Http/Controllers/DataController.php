<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function category($category_name, $time_frame)
    {
        $category = \App\DeviceCategory::where('name', '=', $category_name)->first();

        global $start_date;
        global $end_date;

        switch ($time_frame) {
            case 'day':
                $start_date = Carbon::now()->startOfDay();
                $end_date = Carbon::now()->endOfDay();
                break;

            case 'week':
                $start_date = Carbon::now()->startOfWeek();
                $end_date = Carbon::now()->endOfWeek();
                break;

            case 'month':
                $start_date = Carbon::now()->startOfMonth();
                $end_date = Carbon::now()->endOfMonth();
                break;
        }

        //Init interval
        $dateInterval = \DateInterval::createFromDateString('1 day');
        //Init Date Period from start date to end date
        //1 day is added to end date since date period ends before end date. See first comment: http://php.net/manual/en/class.dateperiod.php
        $dateperiod = new \DatePeriod($start_date, $dateInterval, $end_date);

        $data = [];

        foreach ($dateperiod as $day) {
            array_push($data, 0);
        }

        $devices = $category->devices()->get();

        foreach ($devices as $device) {

            $usagesInRange = $device->energy_usages()->whereBetween('start_time', [$start_date, $end_date])->get();

            foreach ($usagesInRange as $usage) {

                $carbon = Carbon::parse($usage->start_time);

                if ($time_frame == 'day') {
                    $data[0] += $usage->kw_usage;
                }

                if ($time_frame == 'week') {
                    $data[(int)$carbon->dayOfWeekIso - 1] += $usage->kw_usage;
                }

                if ($time_frame == 'month') {
                    $data[(int)$carbon->format('j') - 1] += $usage->kw_usage;
                }


            }
        }

        return $data;

    }

    public function device($device_mac, $time_frame)
    {
        $device = \App\Device::where('id', $device_mac)->first();

        global $start_date;
        global $end_date;

        switch ($time_frame) {
            case 'day':
                $start_date = Carbon::now()->startOfDay();
                $end_date = Carbon::now()->endOfDay();
                break;

            case 'week':
                $start_date = Carbon::now()->startOfWeek();
                $end_date = Carbon::now()->endOfWeek();
                break;

            case 'month':
                $start_date = Carbon::now()->startOfMonth();
                $end_date = Carbon::now()->endOfMonth();
                break;
        }

        //Init interval
        $dateInterval = \DateInterval::createFromDateString('1 day');
        //Init Date Period from start date to end date
        //1 day is added to end date since date period ends before end date. See first comment: http://php.net/manual/en/class.dateperiod.php
        $dateperiod = new \DatePeriod($start_date, $dateInterval, $end_date);

        $data = [];

        foreach ($dateperiod as $day) {
            array_push($data, 0);
        }

            $usagesInRange = $device->energy_usages()->whereBetween('start_time', [$start_date, $end_date])->get();

            foreach ($usagesInRange as $usage) {

                $carbon = Carbon::parse($usage->start_time);

                if ($time_frame == 'day') {
                    $data[0] += $usage->kw_usage;
                }

                if ($time_frame == 'week') {
                    $data[(int)$carbon->dayOfWeekIso - 1] += $usage->kw_usage;
                }

                if ($time_frame == 'month') {
                    $data[(int)$carbon->format('j') - 1] += $usage->kw_usage;
                }


            }

        return $data;

    }

    public function exportCollection($type, $name){

        if ($type == 'category'){
            $collection = DeviceCategory::where('name', $name)->first();
        }

        if ($type == 'device'){
            $collection = Device::where('id', $name)->first();
        }

        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($collection->energy_usages()->get(), ['id' => 'ID', 'device_id' => 'Device ID', 'start_time' => 'Start Time', 'end_time' => 'End Time', 'kw_usage' => 'kW Used'])->download();
    }

}
