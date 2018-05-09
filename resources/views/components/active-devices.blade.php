<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="x`col">Device</th>
        <th scope="col">Usage</th>
    </tr>
    </thead>
    <tbody>
    @foreach($devices as $device)
        <tr>
            <th class="{{$device->is_alive ? 'table-success' : 'table-danger'}}">{{$device->name}}</th>
            <td>4 kW/s</td>
        </tr>
    @endforeach
    </tbody>
</table>