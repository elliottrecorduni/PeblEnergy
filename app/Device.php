<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $casts = [
        'is_legacy' => 'boolean',
        'kw_usage' => 'double'
    ];


    public function category(){
        return $this->belongsTo('App\DeviceCategory', 'category_id');
    }

    public function energy_usages(){
        return $this->hasMany('App\EnergyUsage');
    }

    public function getMissingInformationAttribute(){
            $attributes = ['name', 'category_id', 'mac_address'];
            foreach ($attributes as $attribute) {
                if (empty($this->$attribute)) {
                    return true;
                }
            }
            return false;
    }

    public function getTotalKwAttribute(){
        return $this->energy_usages()->sum('kw_usage');
    }

    public function getIsAliveAttribute(){
        $recent_data = $this->energy_usages()->where('start_time', '>', Carbon::now()->subSeconds(7))->get();
        return($recent_data->count() > 0);

    }
}
