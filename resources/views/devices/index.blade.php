@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                @foreach($devices as $device)
                    <tr>
                        <form method="POST" action="{{route('devices.destroy', $device->id)}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            Device: {{$device->name}}
                            <a class="btn btn-info" href="{{route('devices.edit', $device->id)}}">Show</a>
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="col-md-4">

        </div>
    </div>


@endsection
