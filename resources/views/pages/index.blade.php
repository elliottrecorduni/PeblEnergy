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
                                <div class="card-body">
                                    <!--Electricity Budget Bar-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            Electricity
                                        </div>
                                        <div class="col-md-6">
                                            <div class="progress border border-dark" style="height: 100%">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                     aria-valuemax="{{$userSetting->electricity_budget}}">£32 / {{$userSetting->electricity_budget}}
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
                                                <div class="progress-bar bg-info" role="progressbar"
                                                     style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                     aria-valuemax="{{$userSetting->water_budget}}">£25 / {{$userSetting->water_budget}}
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
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                     style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                     aria-valuemax="100">£50 / {{$userSetting->gas_budget}} // {{$waterTotalKw}}
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
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                     aria-valuemax="100">£108 / {{$userSetting->total_budget}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    @include('components.graph-scripts', ['type' => 'category'])
@endsection

