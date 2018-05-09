@extends('layouts.master')

@section('content')
    <div class="col pt-2">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <!--New Device Modal Card-->
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Devices
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#new_device_modal"
                            style="float:right">New Device
                            </button>
                            <a href="{{route('pages.scan')}}" class="btn btn-info btn-sm mr-2 float-right">Scan</a>
                        </div>
                        <div class="card-body">
                            @if (!$devices || $devices->count() > 0)

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">MAC Address</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($devices as $device)
                                        <tr>
                                            <td>{{$device->name}}
                                                @if ( $device->missing_information ) )
                                                    <span style="position: absolute;" class="badge badge-danger ml-3">Missing Information</span>
                                                @endif</td>
                                            <td>{{$device->mac_address}}</td>
                                            <td>
                                                <a class="btn btn-success text-light"  href="{{route('devices.show', $device->id)}}">View</a>
                                                <a class="btn btn-info text-light"  onclick="activateEditDevModal({{$device->id}})">Edit</a>
                                                <a class="btn btn-danger text-light" data-toggle="modal" data-target="#delete_device_modal">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                <div class="modal fade" id="edit_device_modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="editDevModalLabel">Edit Device</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    Close
                                                </button>
                                                <input type="submit" id="modal-submit" value="Update" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="delete_device_modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete_device_modal _label">Delete Device</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you wish to delete this device?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{route('devices.destroy', $device->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="alert alert-info" role="alert">
                                    You currently have no active devices registered, why not <a href="" data-toggle="modal"
                                                                                         data-target="#new_device_modal">add
                                        one</a>?
                                </div>
                            @endif

                            @include('devices.create')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        function activateEditDevModal($id){
            $('#edit_device_modal').find('.modal-body').load('{{url('devices')}}/' + $id + '/edit');

            $('#edit_device_modal input[id=modal-submit]').click(function () {
                $('#edit_device_modal form').submit();
            });

            $('#edit_device_modal').modal('show');
        }
    </script>
@endsection


