<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $table = 'user_settings';

    public function getTotalBudgetAttribute(){
        $total = 0;
        $total += $this->gas_budget;
        $total += $this->water_budget;
        $total += $this->electricity_budget;

        return $total;
    }
}
