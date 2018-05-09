<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="x`col">Device</th>
        <th scope="col">Usage (kW 10/s)</th>
    </tr>
    </thead>
    <tbody>
    @foreach($devices as $device)
        <tr>
            <th class="{{$device->is_alive ? 'table-success' : 'table-danger'}}">{{$device->name}}</th>
            <td>{{$device->usage_rate_10_seconds}} kW</td>
        </tr>
    @endforeach
    </tbody>
</table>