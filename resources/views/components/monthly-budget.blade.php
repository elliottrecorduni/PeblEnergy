<!--Electricity Budget Bar-->
<div class="row">
    <div class="col-md-6">
        Electricity
    </div>
    <div class="col-md-6">
        <div class="progress border border-dark" style="height: 100%">
            <div class="progress-bar text-dark bg-success" role="progressbar"
                 style="width: {{($electricityTotalPrice/$userSetting->electricity_budget) * 100}}%"
                 aria-valuemin="0"
                 aria-valuemax="100">£{{$electricityTotalPrice}}
                / {{$userSetting->electricity_budget}}
            </div>
        </div>
    </div>
</div>
<br>
<!--Water Budget Bar-->
<div class="row">
    <div class="col-md-6">
        Water
    </div>
    <div class="col-md-6">
        <div class="progress border border-dark" style="height: 100%">
            <div class="progress-bar text-dark bg-info" role="progressbar"
                 style="width: {{($waterTotalPrice/$userSetting->water_budget) * 100}}%" aria-valuemin="0"
                 aria-valuemax="100"> £{{$waterTotalPrice}}
                / {{$userSetting->water_budget}}
            </div>
        </div>
    </div>
</div>
<br>
<!--Gas Budget Bar-->
<div class="row">
    <div class="col-md-6">
        Gas
    </div>
    <div class="col-md-6">
        <div class="progress border border-dark" style="height: 100%">
            <div class="progress-bar text-dark bg-danger" role="progressbar"
                 style="width: {{($gasTotalPrice/$userSetting->gas_budget) * 100}}%" aria-valuemin="0"
                 aria-valuemax="100"> £{{$gasTotalPrice}}
                / {{$userSetting->gas_budget}}
            </div>
        </div>
    </div>
</div>
<br>
<!--Total Budget Bar-->
<div class="row">
    <div class="col-md-6">
        Total
    </div>
    <div class="col-md-6">
        <div class="progress border border-dark" style="height: 100%">
            <div class="progress-bar text-dark bg-success" role="progressbar"
                 style="width: {{($totalMonthPrice/$userSetting->total_budget) * 100}}%" aria-valuemin="0"
                 aria-valuemax="100"> £{{$totalMonthPrice}}
                / {{$userSetting->total_budget}}
            </div>
        </div>
    </div>
</div>
