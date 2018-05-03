<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

@include('layouts.partials._nav')

<!-- Vertical Navbar start -->
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="sidebar navbar-light bg-light pt-2 h-1000">
            <div class="col-2 collapse d-md-flex navbar-light bg-light pt-2 h-1000" id="sidebar" style="max-width:140px;"> <!-- collapse -->
                <ul class="nav flex-column">
                    <li class="nav-item "><a class="nav-link" href="index.html"><i class="fas fa-home text-dark"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="budget.html"><i class="fas fa-money-bill-alt text-dark"></i> Budget</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="devices.html"><i class="fas fa-mobile-alt text-dark"></i>
                            Devices</a></li>
                    <li class="nav-item"><a class="nav-link" href="settings.html"><i class="fas fa-cog text-dark"></i> Settings</a></li>
                </ul>

            </div>
        </div>
        <div class="col pt-2">
            <h2>
                <a href="" data-target="#sidebar" data-toggle="collapse" class="hidden-md-up"></a>
                Dashboard
            </h2>
            <br>
        </div>
    </div>
</div>

@include('layouts.partials._messages')

@yield('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>
</html>