<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PEBL - Smart Energy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="float: right">
        <div class="navbar-nav ml-auto" style="float: right">

            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-exclamation-circle"></i>
                        Notifications
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        {{--@if( $waterTotalPrice > $userSetting->water_budget)--}}
                            {{--<a class="dropdown-item text-primary" href="#">{{$waterTotalPrice}}</a>--}}
                            {{--@else--}}
                            {{--<a class="dropdown-item text-primary" href="#">No notificiations to show</a>--}}
                        {{--@endif--}}
                    </div>
                </li>

                <li class="nav-item text-dark dropdown" style="padding-right:4.5em">
                    <a class="nav-link dropdown-toggle text-dark" href="#"  role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}"><i class="fa fa-male" aria-hidden="true"></i> Edit Profile</a>
                        <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            @else
                <a href="/register" class="btn btn-default">Register</a>
                <a href="/login" class="btn btn-default">Login</a>
            @endif


        </div>
        <div class="hide-navbar">
            <ul class="nav flex-column" id="verticalNavBar">
                <li class="nav-item"><a class="nav-link" href="{{route('pages.index')}}"><i class="fas fa-home text-dark"></i>Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('pages.budget')}}"><i class="fas fa-money-bill-alt text-dark"></i>Budget</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}"><i class="fas fa-mobile-alt text-dark"></i>Devices</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('pages.settings')}}"><i class="fas fa-cog text-dark"></i>Settings</a></li>
            </ul>
        </div>
    </div>
</nav>