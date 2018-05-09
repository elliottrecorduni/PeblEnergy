<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pebl - Smart Energy</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

@include('layouts.partials._nav')
@include('layouts.partials._messages')

<!-- Vertical Navbar start -->
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="sidebar navbar-light bg-light pt-2 h-1000">
            <div class="col-2 collapse d-md-flex navbar-light bg-light pt-2 h-1000" id="sidebar" style="max-width:140px;"> <!-- collapse -->
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{route('pages.index')}}"><i class="fas fa-home text-dark"></i>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('pages.budget')}}"><i class="fas fa-money-bill-alt text-dark"></i>Budget</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('devices.index') }}"><i class="fas fa-mobile-alt text-dark"></i>Devices</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('pages.settings')}}"><i class="fas fa-cog text-dark"></i>Settings</a></li>
                </ul>

            </div>
        </div>
        @yield('content')
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

@yield('footer')
</body>
</html>