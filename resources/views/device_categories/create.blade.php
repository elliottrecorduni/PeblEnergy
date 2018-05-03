@extends('layouts.master')


@section('content')

    <form method="POST" action=" {{ route('devices.store') }}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name"
                   placeholder="Enter Category Name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
