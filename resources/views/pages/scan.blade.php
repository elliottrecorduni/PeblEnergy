@extends('layouts.master')

@section('content')

    <div class="col-md-10">
        <div class="card card-padding">
            <div class="card-header bg-dark text-white">
                Available Devices to Pair
            </div>

            @if($allScans->count() > 0)
            <div class="card-body text-center">
                <table class="table">
                    <th>Name</th>
                    <th>Mac Address</th>
                    <th>Action</th>
                    @foreach($allScans as $scan)
                        <tr>
                            <td>{{$scan->name}}</td>
                            <td>{{$scan->mac_address}}</td>
                            <td>
                                <form action="{{route('devices.pair')}}" method="POST">
                                    {{csrf_field()}}
                                    <input name="name" value="{{$scan->name}}" hidden>
                                    <input name="mac_address" value="{{$scan->mac_address}}" hidden>
                                    <input type="submit" class="btn btn-info" value="Pair">
                                </form>
                            </td>
                        </tr>

                    @endforeach

                </table>
            </div>
            @else
                <div class="container">
                    <p>There are currently no devices to pair</p>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('footer')

    {{--<script>--}}
        {{--var ctx = document.getElementById('totalBudget7D').getContext('2d');--}}
        {{--var chart = new Chart(ctx, {--}}
            {{--// The type of chart we want to create--}}
            {{--type: 'line',--}}

            {{--// The data for our dataset--}}
            {{--data: {--}}
                {{--labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],--}}
                {{--datasets: [{--}}
                    {{--label: "Overall Weekly Water Usage",--}}
                    {{--backgroundColor: 'rgb(255, 99, 132)',--}}
                    {{--borderColor: 'rgb(255, 99, 132)',--}}
                    {{--data: [0, 50, 40, 150, 40, 180, 120],--}}
                {{--}]--}}
            {{--},--}}

            {{--// Configuration options go here--}}
            {{--options: {}--}}
        {{--});--}}
    {{--</script>--}}
@endsection