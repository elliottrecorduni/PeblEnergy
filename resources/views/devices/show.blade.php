@extends('layouts.master')


@section('content')

{{--<h1>Name: </h1>--}}
{{--<h1>MAC Address: {{$device->mac_address}}</h1>--}}
{{--<h1>Category ID: {{$device->category_id}}</h1>--}}

        <div class="col-md-10">
        <div class="card card-padding">
            <div class="card-header bg-dark text-white">
                {{$device->name}} Usage - Category: {{$device->category->name}}
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
                        <canvas id="deviceChart7D"></canvas>
                    </div>
                </row>
            </div>
        </div>
        </div>


@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>


        var ctx = document.getElementById('deviceChart7D').getContext('2d');
        var deviceChart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Device Usage",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                }]
            },

            // Configuration options go here
            options: {}
        });

        (function update() {

            console.log('update ran');

            fetch('http://127.0.0.1:8000/api/data/device/{{$device->mac_address}}/week')
                .then(function (data) {
                    return data.json();
                }).then(function (data) {
                deviceChart.data.datasets[0].data = data;
                deviceChart.update();
            });
            setTimeout(update, 5000);
        })();

    </script>
@endsection
