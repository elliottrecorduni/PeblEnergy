<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DeviceCategory extends Model
{
    public function devices(){
        return $this->hasMany('App\Device', 'category_id');
    }

    public function energy_usages(){
        return $this->hasManyThrough('App\EnergyUsage', 'App\Device', 'category_id');
    }

    public function getTotalKwAttribute(){
        return $this->devices->reduce(function ($total, $device){
            return $total + $device->total_kw;
        });
    }

    public function getTotalKwCurrentMonthAttribute(){
        return $this->energy_usages()->whereBetween('start_time', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('kw_usage');
    }

    public function getTotalPriceCurrentMonthAttribute(){
        $user_setting = UserSetting::first();

        return ( number_format((($this->getTotalKwCurrentMonthAttribute() * $user_setting->kwh_price) / 100), 2, '.', '')) ;
    }

    public static function getTotalPriceCurrentMonthGroupAttribute(array $categories){

        $total_price = 0;

        foreach ($categories as $category_name){
            $category = DeviceCategory::where('name', $category_name)->first();
            $total_price += $category->total_price_current_month;
        }
        return ( number_format(($total_price), 2, '.', ''));
    }

}
