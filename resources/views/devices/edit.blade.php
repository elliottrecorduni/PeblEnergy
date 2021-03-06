    <form method="POST" action=" {{ route('devices.update', $device->id) }}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name"
                   placeholder="Enter name" value="{{$device->name}}">
        </div>
        <div class="form-group">
            <label for="mac_address">MAC Address</label>
            <input type="mac_address" class="form-control" id="mac_address" name="mac_address"
                   placeholder="Enter MAC Address" value="{{ $device->mac_address }}">
        </div>

        <div class="form-group">
            <label for="category_id">Device Category</label>
            @if ( is_null($device->category_id) )
                <span class="badge badge-danger">Please set a Category</span>
            @endif
            <select class="form-control" id="category_id" name="category_id" value="{{ $device->category_id }}">
                <option selected disabled>Category</option>
            @foreach ($deviceCategories as $category)

                    @if ($device->category_id == $category->id)
                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif

                @endforeach
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="api_token">API Token - <span class="text-danger">Never share your API Token</span></label>
            <a class="btn btn-sm btn-info float-right" onclick="newAPIToken()">Generate New Token</a>
            <input type="text" class="form-control" id="api_token" name="api_token" value="{{$device->api_token}}"
                   placeholder="Enter API Token">
        </div>
    </form>
