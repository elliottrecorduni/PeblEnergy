

@foreach($devices as $device)

    <h1>Device: {{$device->name}}
    {{$device->created_at->diffForHumans()}}</h1>

@endforeach

{{-- Test Comment--}}