@extends('layouts.master')


@section('content')

        <div class="col-md-10">
            @include('components.graph', ['name' => "$device->id", 'real_name' => "$device->name", 'type' => 'device'])
        </div>


@endsection

@section('footer')
    @include('components.graph-scripts', ['type' => 'device'])
@endsection
