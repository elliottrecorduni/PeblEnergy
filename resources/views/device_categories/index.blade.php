@extends('layouts.master')

@section('content')
    <div class="col pt-2">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <!--New Category Card-->
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Devices
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#new_category_modal"
                                    style="float:right">New Category
                            </button>
                        </div>
                        <div class="card-body">
                            @if ($categories->count() > 0)

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                <a class="btn btn-info text-light" onclick="activateEditCategoryModal({{$category->id}})">Edit</a>
                                                <a class="btn btn-danger text-light" data-toggle="modal" data-target="#delete_category_modal">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                <div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="edit_category_modal_label">Edit Category</h5>
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

                                <div class="modal fade" id="delete_category_modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete_category_modal_label">Delete Device</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you wish to delete this device?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{route('device-categories.destroy', $category->id)}}">
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
                                    You currently have no devices registered, why not <a href="" data-toggle="modal"
                                                                                         data-target="#new_category_modal">add
                                        one</a>?
                                </div>
                            @endif

                            <div class="modal fade" id="new_category_modal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="new_category_modal_label">Add New Category</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="POST" action="{{ route('device-categories.store') }}">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="name" class="text-dark">Device Name:</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           placeholder="Enter Category Name">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <input type="submit" value="Confirm" class="btn btn-success">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        function activateEditCategoryModal($id){
            $('#edit_category_modal').find('.modal-body').load('{{url('device-categories')}}/' + $id + '/edit');

            $('#edit_category_modal input[id=modal-submit]').click(function () {
                $('#edit_category_modal form').submit();
            });

            $('#edit_category_modal').modal('show');
        }
    </script>
@endsection


