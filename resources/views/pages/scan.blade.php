@extends('layouts.master')

@section('content')

    <div class="col-md-10">
        <div class="card card-padding" id="scan-card">
            <div class="card-header bg-dark text-white">
                Available Devices to Pair
            </div>

            @if($allScanDevices->count() > 0)
                <div class="card-body text-center">
                    <table class="table">
                        <th>Name</th>
                        <th>Mac Address</th>
                        <th>Action</th>
                        @foreach($allScanDevices as $scan)
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

    <script>
        // (function updateScan() {
        //     fetch('http://127.0.0.1:8000/components/scan')
        //         .then(function (data) {
        //             return data.text();
        //         }).then(function (data) {
        //
        //         var mb = document.getElementById('scan-card');
        //         mb.innerHTML = data;
        //     });
        //     setTimeout(updateScan, 5000);
        // })();
    </script>

@endsection