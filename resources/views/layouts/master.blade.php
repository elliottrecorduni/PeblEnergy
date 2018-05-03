<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

@include('layouts.partials._nav')

<!-- Vertical Navbar start -->
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="sidebar navbar-light bg-light pt-2 h-1000">
            <div class="col-2 collapse d-md-flex navbar-light bg-light pt-2 h-1000" id="sidebar" style="max-width:140px;"> <!-- collapse -->
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="index.html"><i class="fas fa-home text-dark"></i>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="budget.html"><i class="fas fa-money-bill-alt text-dark"></i>Budget</a></li>
                    <li class="nav-item"><a class="nav-link" href="devices.html"><i class="fas fa-mobile-alt text-dark"></i>Devices</a></li>
                    <li class="nav-item"><a class="nav-link" href="settings.html"><i class="fas fa-cog text-dark"></i>Settings</a></li>
                </ul>

            </div>
        </div>

        @include('layouts.partials._messages')

        @yield('content')
    </div>


</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>