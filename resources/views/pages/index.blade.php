@extends('layouts.master')

@section('content')
    <div class="col pt-2">
        <h2>
            <a href="" data-target="#sidebar" data-toggle="collapse" class="hidden-md-up"></a>
            Dashboard
        </h2>
        <br>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <!--Real Time Data Usage Card-->
                        <div class="col-md-6">
                            <div class="card card-padding" style="height:258px">
                                <div class="card-header bg-dark text-white">
                                    Real Time Data Usage
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td class="text-dark"><i class="fas fa-bolt"></i> Electricity</td>
                                            <td class="text-danger">12 m^3/s</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark"><i class="fas fa-tint"></i> Water</td>
                                            <td class="text-primary">12 m^3/s</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark"><i class="fas fa-fire"></i> Gas</td>
                                            <td class="text-warning">12 m^3/s</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <!--Monthly Budget Card-->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Monthly Budget
                                </div>
                                <div class="card-body" id="monthly-budget-card">
                                    @if(is_null($userSetting))
                                        Please <a href="{{route('pages.settings')}}">save your settings</a> in order
                                        to view them
                                    @else

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
                                                         style="width: {{($waterTotalPrice/$userSetting->water_budget) * 100}}%"
                                                         aria-valuemin="0"
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
                                                         style="width: {{($gasTotalPrice/$userSetting->gas_budget) * 100}}%"
                                                         aria-valuemin="0"
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
                                                         style="width: {{($totalMonthPrice/$userSetting->total_budget) * 100}}%"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"> £{{$totalMonthPrice}}
                                                        / {{$userSetting->total_budget}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('components.graph', ['name' => 'Electricity', 'type' => 'category'])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @include('components.graph', ['name' => 'Water', 'type' => 'category'])
                        </div>
                    </div>
                    <!--End Row-->

                </div>
                <!--End of Col-Md-8-->

                <!--Active Devices Card-->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Active Devices
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="x`col">Device</th>
                                    <th scope="col">Usage</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($devices as $device)
                                    <tr>
                                        <th>{{$device->name}}</th>
                                        <td>4 kW/s</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Active Devices Card-->
            </div>


        </div>
    </div>

@endsection

@section('footer')

    <script>
        (function update() {
            fetch('http://127.0.0.1:8000/components/monthly-budget')
                .then(function (data) {
                    return data.text();
                }).then(function (data) {

                var mb = document.getElementById('monthly-budget-card');
                mb.innerHTML = data;
            });
            setTimeout(update, 5000);
        })();
    </script>

    @include('components.graph-scripts', ['type' => 'category'])
@endsection

