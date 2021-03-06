{{--@if ($errors->any())--}}
    {{--<div class="text-danger">--}}
        {{--<div>--}}
            {{--There were some errors with your submission--}}
        {{--</div>--}}
        {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--@endif--}}

<div class="col-12 flash-message" id="message-banner">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
    @endforeach
</div>