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