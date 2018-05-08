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
                                                     aria-valuemax="100">£32 / 70
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
                                                     aria-valuemax="100">£25 / 50
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
                                                     aria-valuemax="100">£50 / 60
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
                                                     aria-valuemax="100">£108 / 180
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
                            <div class="card card-padding mobilePadding">
                                <div class="card-header bg-dark text-white">
                                    Electricity Usage (kW)
                                </div>
                                <div class="card-body text-center">
                                    <!--<row class="btn-toolbar" >-->

                                    <button class="btn btn-secondary button-spacing">Custom</button>
                                    <button class="btn btn-secondary button-spacing">1 Day</button>
                                    <button class="btn btn-warning button-spacing">7 Days</button>
                                    <button class="btn btn-secondary button-spacing">30 Days</button>
                                    <button class="btn btn-secondary button-spacing">1 Year</button>
                                    <button class="btn btn-secondary button-spacing float-right"><i
                                                class="fas fa-download"></i></button>
                                    <!--</row>-->
                                    <br>
                                    <row>
                                        <div class="">
                                            <canvas id="elecChart7D"></canvas>
                                        </div>
                                        <!--<img src="img/test-graph.png" style="width: 100%; height:100%" alt="">-->
                                    </row>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-padding">
                                <div class="card-header bg-dark text-white">
                                    Water Usage (m^3/s)
                                </div>
                                <div class="card-body text-center">
                                    <row>
                                        <button class="btn btn-secondary button-spacing">Custom</button>
                                        <button class="btn btn-secondary button-spacing">1 Day</button>
                                        <button class="btn btn-warning button-spacing">7 Days</button>
                                        <button class="btn btn-secondary button-spacing">30 Days</button>
                                        <button class="btn btn-secondary button-spacing">1 Year</button>
                                        <button class="btn btn-secondary button-spacing float-right"><i
                                                    class="fas fa-download"></i></button>
                                    </row>
                                    <br>
                                    <row>
                                        <div class="">
                                            <canvas id="waterChart7D"></canvas>
                                        </div>
                                        <!--<img src="img/test-graph.png" style="width: 100%; height:100%" alt="">-->
                                    </row>
                                </div>
                            </div>
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
                                <tr>
                                    <th>Fridge</th>
                                    <td>4 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>
                                <tr>
                                    <th>Kettle</th>
                                    <td>3 kW/s</td>
                                </tr>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!--7 Day Overall Electricity Line Graph-->
    <script>


        var ctx = document.getElementById('elecChart7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Weekly Electricity Usage",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                }]
            },

            // Configuration options go here
            options: {}
        });

        (function update() {

            console.log('update ran');

            fetch('http://127.0.0.1:8000/api/data/Electricity/week')
                .then(function (data) {
                    return data.json();
                }).then(function (data) {
                chart.data.datasets[0].data = data;
                chart.update();
            });
            setTimeout(update, 5000);
        })();

    </script>

@endsection


