<div class="modal fade" id="new_device_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="new_device_modal_label">Add New Device</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action=" {{ route('devices.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" name="name"
                               placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="mac_address">MAC Address</label>
                        <input type="mac_address" class="form-control" id="mac_address" name="mac_address"
                               placeholder="Enter MAC Address">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Device Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option selected disabled>Category</option>
                        @foreach ($deviceCategories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="api_token">API Token - <span class="text-danger">Never share your API Token</span></label>
                        <a class="btn btn-sm btn-info float-right" onclick="newAPIToken()">Generate New Token</a>
                        <input type="text" class="form-control" id="api_token" name="api_token" value="{{str_random(10)}}"
                               placeholder="Enter API Token">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">
                    Close
                </button>
                <input type="submit" value="Confirm" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>