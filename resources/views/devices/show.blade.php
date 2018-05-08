@extends('layouts.master')


@section('content')

        <div class="col-md-10">
        <div class="card card-padding">
            <div class="card-header bg-dark text-white">
                {{$device->name}} Usage - Category: {{$device->category->name}}
            </div>
            <div class="card-body text-center">
                <row id="graph">
                    {{--<button class="btn btn-secondary button-spacing">Custom</button>--}}
                    <a class="btn text-light btn-secondary button-spacing" onclick="show1Day()" id="btn-1-day">1 Day</a>
                    <a class="btn text-light btn-secondary btn-warning button-spacing" onclick="showWeek()" id="btn-week">Week</a>
                    <a class="btn text-light btn-secondary button-spacing" onclick="showMonth()" id="btn-month">Month</a>
                    {{--<button class="btn btn-secondary button-spacing">1 Year</button>--}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

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

        var time_frame = 'week';

        (function update() {

            fetch('http://127.0.0.1:8000/api/data/device/{{$device->mac_address}}/' + time_frame)
                .then(function (data) {
                    return data.json();
                }).then(function (data) {

                if(data.length === 1){
                    deviceChart.data.datasets[0].data = [0, data[0], 0];
                }else{
                    deviceChart.data.datasets[0].data = data;
                }

                deviceChart.update();
            });
            setTimeout(update, 5000);
        })();

        function show1Day(){
            $('#graph').children('a').each(function (index, item) {
                $(item).removeClass('btn-warning');
            });
            $('#btn-1-day').addClass('btn-warning');

            time_frame = 'day';
            fetch('http://127.0.0.1:8000/api/data/device/{{$device->mac_address}}/' + time_frame)
                .then(function (data) {
                    return data.json();
                }).then(function (data) {

                deviceChart.data.labels = ['', 'Today', ''];
                deviceChart.data.datasets[0].data = [0, data[0], 0];

                deviceChart.update();

            });
        }

        function showWeek(){
            $('#graph').children('a').each(function (index, item) {
                $(item).removeClass('btn-warning');
            });
            $('#btn-week').addClass('btn-warning');

            time_frame = 'week';

            fetch('http://127.0.0.1:8000/api/data/device/{{$device->mac_address}}/' + time_frame)
                .then(function (data) {
                    return data.json();
                }).then(function (data) {

                deviceChart.data.labels = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                deviceChart.data.datasets[0].data = data;

                deviceChart.update();

            });
        }

        function showMonth(){

            $('#graph').children('a').each(function (index, item) {
                $(item).removeClass('btn-warning');
            });
            $('#btn-month').addClass('btn-warning');

            time_frame = 'month';

            fetch('http://127.0.0.1:8000/api/data/device/{{$device->mac_address}}/' + time_frame)
                .then(function (data) {
                    return data.json();
                }).then(function (data) {
                    days = [];
                    for (i = 0; i < data.length; i++) {
                        days.push(i + 1)
                    }
                    deviceChart.data.labels = days;
                    deviceChart.data.datasets[0].data = data;

                    deviceChart.update();

            });

        }

    </script>
@endsection
