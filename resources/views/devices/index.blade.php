@extends('layouts.master')


@section('content')

    @foreach($devices as $device)

        <h1>


            <form method="POST" action="{{route('devices.destroy', $device->id)}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                Device: {{$device->name}}
                <a class="btn btn-info" href="{{route('devices.edit', $device->id)}}">Show</a>
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </h1>

    @endforeach

@endsection
