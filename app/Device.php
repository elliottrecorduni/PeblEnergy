<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $casts = [
        'is_legacy' => 'boolean'
    ];


    public function category(){
        return $this->belongsTo('App\DeviceCategory', 'category_id');
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
}
