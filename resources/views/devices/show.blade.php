@extends('layouts.master')


@section('content')

<h1>Name: {{$device->name}}</h1>
<h1>MAC Address: {{$device->mac_address}}</h1>
<h1>Category ID: {{$device->category_id}}</h1>

@endsection
