<div class="card card-padding">
    <div class="card-header bg-dark text-white">
        {{empty($real_name) ? $name : $real_name}} Usage (kW)
    </div>

    {!! !empty($header) ? $header : '' !!}

    <div class="card-body text-center">
        <row id="auto__{{$name}}-chart-buttons">
            {{--<button class="btn btn-secondary button-spacing">Custom</button>--}}
            <a class="btn text-light btn-secondary button-spacing" onclick="show1Day('{{$name}}')" id="btn-1-day">1 Day</a>
            <a class="btn text-light btn-secondary btn-warning button-spacing" onclick="showWeek('{{$name}}')" id="btn-week">Week</a>
            <a class="btn text-light btn-secondary button-spacing" onclick="showMonth('{{$name}}')" id="btn-month">Month</a>
            {{--<button class="btn btn-secondary button-spacing">1 Year</button>--}}
            <button class="btn btn-secondary button-spacing float-right"><i
                        class="fas fa-download"></i></button>
        </row>
        <br>
        <row>
            <div>
                <canvas id="auto__{{$name}}-chart"></canvas>
            </div>
        </row>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

<script>
    var ctx = document.getElementById('auto__{{$name}}-chart').getContext('2d');
    var auto__{{$name}}Chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            datasets: [{
                label: "Overall {{empty($real_name) ? $name : $real_name}} Usage",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "kW"
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: "Time Frame"
                    }
                }]
            }
        }
    });

    var auto__{{$name}}_time_frame = 'week';

    (function update() {

        fetch('http://127.0.0.1:8000/api/data/{{$type}}/{{$name}}/' + auto__{{$name}}_time_frame)
            .then(function (data) {
                return data.json();
            }).then(function (data) {

            if(data.length === 1){
                auto__{{$name}}Chart.data.datasets[0].data = [0, data[0], 0];
            }else{
                auto__{{$name}}Chart.data.datasets[0].data = data;
            }
            auto__{{$name}}Chart.update();
        });
        setTimeout(update, 5000);
    })();

</script>