    <form method="POST" action=" {{ route('device-categories.update', $deviceCategory->id) }}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" name="name"
                   placeholder="Enter name" value="{{$deviceCategory->name}}">
        </div>
    </form>
