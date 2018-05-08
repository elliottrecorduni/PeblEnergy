<script>

    function show1Day(category_name){

        updateChartButtons(category_name, '1-day');


        window[category_name+'_time_frame'] = 'day';

        fetch('http://127.0.0.1:8000/api/data/{{$type}}/' + category_name + '/day')
            .then(function (data) {
                return data.json();
            }).then(function (data) {

            window[category_name+'Chart'].data.labels = ['', 'Today', ''];
            window[category_name+'Chart'].data.datasets[0].data = [0, data[0], 0];

            window[category_name+'Chart'].update();

        });
    }

    function showWeek(category_name){
        updateChartButtons(category_name, 'week');

        window[category_name+'_time_frame'] = 'week';

        fetch('http://127.0.0.1:8000/api/data/{{$type}}/' + category_name + '/week')
            .then(function (data) {
                return data.json();
            }).then(function (data) {

            window[category_name+'Chart'].data.labels = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            window[category_name+'Chart'].data.datasets[0].data = data;

            window[category_name+'Chart'].update();

        });
    }

    function showMonth(category_name){

        updateChartButtons(category_name, 'month');

        window[category_name+'_time_frame'] = 'month';

        fetch('http://127.0.0.1:8000/api/data/{{$type}}/' + category_name + '/month')
            .then(function (data) {
                return data.json();
            }).then(function (data) {
            days = [];
            for (i = 0; i < data.length; i++) {
                days.push(i + 1)
            }
            window[category_name+'Chart'].data.labels = days;
            window[category_name+'Chart'].data.datasets[0].data = data;

            window[category_name+'Chart'].update();

        });

    }

    function updateChartButtons(category_name, time_frame){
        $('#' + category_name + '-chart-buttons').children('a').each(function (index, item) {
            $(item).removeClass('btn-warning');
        });
        $('#' + category_name + '-chart-buttons' + ' #btn-' + time_frame).addClass('btn-warning');
    }

</script>