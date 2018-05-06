@extends('layouts.master')

@section('content')
    <div class="col pt-2">
        <h2>
            Budget
        </h2>
        <br>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-padding">
                        <div class="card-header bg-dark text-white">
                            Electricity Usage (kW)
                        </div>
                        <div class="card-body">
                            <div style="padding-left: 12px">
                                <p><b>Price Per kW:</b> £0.45</p>

                                <p><b>Budget For Month:</b> <span style="padding-right:10px;">£300</span><i class="fas fa-pencil-alt"></i></p>

                                <p><b>Spent This Month:</b> £192</p>
                            </div>

                            <button class="btn btn-secondary button-spacing">Custom</button>
                            <button class="btn btn-secondary button-spacing">1 Day</button>
                            <button class="btn btn-warning button-spacing">7 Days</button>
                            <button class="btn btn-secondary button-spacing">30 Days</button>
                            <button class="btn btn-secondary button-spacing">1 Year</button>
                            <button class="btn btn-secondary button-spacing float-right">
                                <i class="fas fa-download"></i></button>
                            <br>
                            <div class="">
                                <canvas id="elecBudget7D"></canvas>
                            </div>

                        </div>
                    </div>
                </div>


                <!--Water Budget-->
                <div class="col-md-6">
                    <div class="card card-padding">
                        <div class="card-header bg-dark text-white">
                            Gas Usage (kW)
                        </div>
                        <div class="card-body text-center">
                            <p><b>Price Per kW:</b> £0.45</p>

                            <p><b>Budget For Month:</b> <span style="padding-right:10px;">£300</span><i class="fas fa-pencil-alt"></i></p>

                            <p><b>Spent This Month:</b> £192</p>

                            <button class="btn btn-secondary button-spacing">Custom</button>
                            <button class="btn btn-secondary button-spacing">1 Day</button>
                            <button class="btn btn-warning button-spacing">7 Days</button>
                            <button class="btn btn-secondary button-spacing">30 Days</button>
                            <button class="btn btn-secondary button-spacing">1 Year</button>
                            <button class="btn btn-secondary button-spacing float-right"><i
                                        class="fas fa-download"></i></button>
                            <br>
                            <div class="">
                                <canvas id="waterBudget7D"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!--Gas Chart-->
                <div class="col-md-6">
                    <div class="card card-padding">
                        <div class="card-header bg-dark text-white">
                            Water Usage (kW)
                        </div>
                        <div class="card-body text-center">
                            <p><b>Price Per kW:</b> £0.45</p>

                            <p><b>Budget For Month:</b> <span style="padding-right:10px;">£300</span><i class="fas fa-pencil-alt"></i></p>

                            <p><b>Spent This Month:</b> £192</p>

                            <button class="btn btn-secondary button-spacing">Custom</button>
                            <button class="btn btn-secondary button-spacing">1 Day</button>
                            <button class="btn btn-warning button-spacing">7 Days</button>
                            <button class="btn btn-secondary button-spacing">30 Days</button>
                            <button class="btn btn-secondary button-spacing">1 Year</button>
                            <button class="btn btn-secondary button-spacing float-right"><i
                                        class="fas fa-download"></i></button>
                            <br>
                            <div class="">
                                <canvas id="gasBudget7D"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Overall Chart-->
                <div class="col-md-6">
                    <div class="card card-padding">
                        <div class="card-header bg-dark text-white">
                            Total Usage (kW)
                        </div>
                        <div class="card-body text-center">
                            <p><b>Price Per kW:</b> £0.45</p>

                            <p><b>Budget For Month:</b> <span style="padding-right:10px;">£300</span><i class="fas fa-pencil-alt"></i></p>

                            <p><b>Spent This Month:</b> £192</p>

                            <button class="btn btn-secondary button-spacing">Custom</button>
                            <button class="btn btn-secondary button-spacing">1 Day</button>
                            <button class="btn btn-warning button-spacing">7 Days</button>
                            <button class="btn btn-secondary button-spacing">30 Days</button>
                            <button class="btn btn-secondary button-spacing">1 Year</button>
                            <button class="btn btn-secondary button-spacing float-right"><i
                                        class="fas fa-download"></i></button>
                            <br>
                            <div class="">
                                <canvas id="totalBudget7D"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--end of charts-->
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


    <!--7 Day Overall Electricity Line Graph-->
    <script>
        var ctx = document.getElementById('elecBudget7D').getContext('2d');
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
                    data: [0, 10, 5, 2, 20, 30, 45],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>


    <!--7 Day Overall Water Line Graph-->
    <script>
        var ctx = document.getElementById('waterBudget7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Weekly Water Usage",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 50, 40, 150, 40, 180, 120],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <script>
        var ctx = document.getElementById('gasBudget7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Weekly Water Usage",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 50, 40, 150, 40, 180, 120],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <script>
        var ctx = document.getElementById('totalBudget7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Weekly Water Usage",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 50, 40, 150, 40, 180, 120],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
@endsection