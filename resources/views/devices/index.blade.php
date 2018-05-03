<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Title</title>
            <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
                  integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
                  crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">
        </head>
<body>
<!--Horizontal Navbar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="">
    <a class="navbar-brand" href="#">PEBL - Smart Energy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="float: right">
        <div class="navbar-nav ml-auto" style="float: right">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exclamation-circle"></i>
                    Notifications
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-primary" href="#">New Device: Kettle</a>
                    <a class="dropdown-item text-primary" href="#">Weekly Budget Met!</a>
                </div>
            </li>

            <li class="nav-item text-dark dropdown" style="padding-right:4.5em">
                <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> Username
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>

                </div>
            </li>

        </div>
        <div class="hide-navbar">
            <ul class="nav flex-column" id="verticalNavBar">
                <li class="nav-item "><a class="nav-link" href="index.html"><i class="fas fa-home text-dark"></i>
                        Home</a></li>
                <li class="nav-item"><a class="nav-link" href="budget.html"><i
                                class="fas fa-money-bill-alt text-dark"></i> Budget</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-mobile-alt text-dark"></i>
                        Devices</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-cog text-dark"></i> Settings</a></li>
            </ul>

        </div>
    </div>
</nav>
<!--Horizontal Navbar end-->

<!-- Vertical Navbar start -->
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="sidebar navbar-light bg-light pt-2 h-1000">
            <div class="col-2 collapse d-md-flex navbar-light bg-light pt-2 h-1000" id="sidebar"
                 style="max-width:140px;"> <!-- collapse -->
                <ul class="nav flex-column">
                    <li class="nav-item "><a class="nav-link" href="index.html"><i class="fas fa-home text-dark"></i>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="budget.html"><i
                                    class="fas fa-money-bill-alt text-dark"></i> Budget</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="devices.html"><i
                                    class="fas fa-mobile-alt text-dark"></i>
                            Devices</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-cog text-dark"></i> Settings</a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col pt-2">
            <h2>
                Devices
            </h2>
            <br>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8">
                        <!--New Device Modal Card-->
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                Active Devices
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#newDevModal"
                                        style="float:right">New Device
                                </button>
                                <div class="modal fade" id="newDevModal" tabindex="-1" role="dialog"
                                     aria-labelledby="newDevModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="newDevModalLabel">Add New
                                                    Device</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="inputDevice" class="text-dark">Device Name:</label>
                                                        <input type="text" class="form-control" id="deviceName"
                                                               aria-describedby="emailHelp"
                                                               placeholder="Enter Device Name">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="inputDevice" class="text-dark">MAC Address:</label>
                                                        <input type="text" class="form-control" id="macAddress"
                                                               aria-describedby="emailHelp"
                                                               placeholder="Enter MAC Address">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="deviceType" class="text-dark">Device Type:</label>
                                                        <select class="form-control" id="deviceType">
                                                            <option value="" disabled selected>Select Device Type
                                                            </option>
                                                            <option>Electricity</option>
                                                            <option>Water</option>
                                                            <option>Gas</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-success">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">Device</th>
                                        <th scope="col">Monthly Usage</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($devices as $device)
                                        <tr>
                                            <td>Device: {{$device->name}}</td>
                                            <td><a class="btn btn-info" href="{{route('devices.edit', $device->id)}}">Show</a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('devices.destroy', $device->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!--DASHBOARD MODAL -->
                                    <div class="modal fade" id="dashboardModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="dashboardModalLabel">Device
                                                        Dashboard</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <!--Navbar Start-->
                                                        <div class="col-md-3">
                                                            <div class="sidebar pt-2 h-1000">
                                                                <div class="col-2 collapse d-md-flex pt-2 h-1000"
                                                                     id="sidebar" style="max-width:140px;">
                                                                    <!-- collapse -->
                                                                    <ul class="nav flex-column">
                                                                        <h2>Trends</h2>
                                                                        <br>
                                                                        <!--<button id="trend1">Hide</button>-->
                                                                        <!--<button id="trend2">Hide</button>-->
                                                                        <li class="nav-item "><a class="nav-link"
                                                                                                 id="trend1" href="#"><i
                                                                                        class="fas fa-home text-dark"></i>
                                                                                Trend 1</a></li>
                                                                        <li class="nav-item"><a class="nav-link"
                                                                                                id="trend2" href="#"><i
                                                                                        class="fas fa-money-bill-alt text-dark"></i>
                                                                                Trend 2</a>
                                                                        </li>
                                                                        <li class="nav-item"><a class="nav-link"
                                                                                                id="trend3" href="#"><i
                                                                                        class="fas fa-mobile-alt text-dark"></i>
                                                                                Trend 3</a></li>
                                                                        <li class="nav-item"><a class="nav-link"
                                                                                                id="trend4" href="#"><i
                                                                                        class="fas fa-cog text-dark"></i>
                                                                                Trend 4</a></li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Navbar End-->

                                                        <!--Graph Start-->
                                                        <div class="col-md-9">
                                                            <canvas id="waterBudget7D"></canvas>
                                                            <canvas id="gasBudget7D" style="display: none"></canvas>
                                                            <canvas id="elecBudget7D" style="display: none"></canvas>
                                                            <canvas id="totalBudget7D" style="display: none"></canvas>
                                                        </div>
                                                        <!--Graph End-->

                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--DASHBOARD MODAL END -->


                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="card card-padding">
                            <div class="card-header bg-dark text-white">
                                Device Info
                            </div>
                            <div class="card-body">
                                <div style="padding-left: 12px">
                                    <p><b>Name:</b> Fridge</p>

                                    <p><b>Status:</b> <span style="color:#61EC10"> Online</span></p>

                                    <p><b>Added On:</b> 01/05/18</p>
                                    <div style="padding-top: 10px">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            Delete
                                        </button>
                                    </div>

                                    <!--EDIT MODAL-->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                         aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Device</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="inputDevice">Device Name</label>
                                                            <input type="text" class="form-control" id="inputDevice"
                                                                   aria-describedby="emailHelp"
                                                                   placeholder="Enter Device Name">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" class="btn btn-success">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END EDIT MODAL-->

                                    <!--DELETE MODAL-->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Device</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you wish to delete this device?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END DELETE MODAL-->

                                </div>

                            </div>
                        </div>
                    </div>

                    <!--End Active Devices -->
                </div>


            </div>

            <!--end of row-->

        </div>

    </div>

    <!-- Vertical Navbar end -->
    <!--<script src="js/chart.js"></script>-->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!--7 Day Overall Electricity Line Graph-->
    <script>
        var ctx = document.getElementById('elecBudget7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Weekly Electricity Usage 2",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>


    <!--7 Day Overall Water Line Graph-->
    <script>
        var ctx = document.getElementById('waterBudget7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Weekly Water Usage 2",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 50, 40, 150, 40, 180, 120],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <script>
        var ctx = document.getElementById('gasBudget7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Weekly Gas Usage",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 25, 15, 75, 90, 180, 120],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <script>
        var ctx = document.getElementById('totalBudget7D').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                datasets: [{
                    label: "Overall Total Usage",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 75, 40, 110, 75, 180, 110],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#hide").click(function () {
                $("p").hide();
            });
            $("#show").click(function () {
                $("p").show();
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#trend1").click(function () {
                $("#waterBudget7D").show();
                $("#elecBudget7D").hide();
                $("#gasBudget7D").hide();
                $("#totalBudget7D").hide();
            });
            $("#trend2").click(function () {
                $("#waterBudget7D").hide();
                $("#elecBudget7D").show();
                $("#gasBudget7D").hide();
                $("#totalBudget7D").hide();
            });
            $("#trend3").click(function () {
                $("#waterBudget7D").hide();
                $("#elecBudget7D").hide();
                $("#gasBudget7D").show();
                $("#totalBudget7D").hide();
            });
            $("#trend4").click(function () {
                $("#waterBudget7D").hide();
                $("#elecBudget7D").hide();
                $("#gasBudget7D").hide();
                $("#totalBudget7D").show();
            });

        });
    </script>
</body>
</html>

