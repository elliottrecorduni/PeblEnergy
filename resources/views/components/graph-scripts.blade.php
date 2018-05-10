<script>

    function show1Day(category_name){

        updateChartButtons(category_name, '1-day');


        window['auto__'+category_name+'_time_frame'] = 'day';

        fetch('{{env('APP_URL')}}/api/data/{{$type}}/' + category_name + '/day')
            .then(function (data) {
                return data.json();
            }).then(function (data) {

            window['auto__'+category_name+'Chart'].data.labels = ['', 'Today', ''];
            window['auto__'+category_name+'Chart'].data.datasets[0].data = [0, data[0], 0];

            window['auto__'+category_name+'Chart'].update();

        });
    }

    function showWeek(category_name){
        updateChartButtons(category_name, 'week');

        window['auto__'+category_name+'_time_frame'] = 'week';

        fetch('{{env('APP_URL')}}//api/data/{{$type}}/' + category_name + '/week')
            .then(function (data) {
                return data.json();
            }).then(function (data) {

            window['auto__'+category_name+'Chart'].data.labels = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            window['auto__'+category_name+'Chart'].data.datasets[0].data = data;

            window['auto__'+category_name+'Chart'].update();

        });
    }

    function showMonth(category_name){

        updateChartButtons(category_name, 'month');

        window['auto__'+category_name+'_time_frame'] = 'month';

        fetch('{{env('APP_URL')}}/api/data/{{$type}}/' + category_name + '/month')
            .then(function (data) {
                return data.json();
            }).then(function (data) {
            days = [];
            for (i = 0; i < data.length; i++) {
                days.push(i + 1)
            }
            window['auto__'+category_name+'Chart'].data.labels = days;
            window['auto__'+category_name+'Chart'].data.datasets[0].data = data;

            window['auto__'+category_name+'Chart'].update();

        });

    }

    function showYear(category_name){

        updateChartButtons(category_name, 'year');

        window['auto__'+category_name+'_time_frame'] = 'year';

        fetch('{{env('APP_URL')}}/api/data/{{$type}}/' + category_name + '/year')
            .then(function (data) {
                return data.json();
            }).then(function (data) {
            days = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            window['auto__'+category_name+'Chart'].data.labels = days;
            window['auto__'+category_name+'Chart'].data.datasets[0].data = data;

            window['auto__'+category_name+'Chart'].update();

        });

    }

    function updateChartButtons(category_name, time_frame){
        $('#auto__' + category_name + '-chart-buttons').children('a').each(function (index, item) {
            $(item).removeClass('btn-warning');
        });
        $('#auto__' + category_name + '-chart-buttons' + ' #btn-' + time_frame).addClass('btn-warning');
    }

</script>