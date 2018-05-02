@extends('layouts.master')


@section('content')

    @foreach($devices as $device)

        <h1>Device: {{$device->name}}
            <button type="button" class="btn btn-info">Info</button></h1>

    @endforeach

@endsection
