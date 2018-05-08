<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/css/bootstrap-slider.min.css">
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

            <!-- start of content -->


            <h2>
                <a href="" data-target="#sidebar" data-toggle="collapse" class="hidden-md-up"></a>
                User Settings
            </h2>
            <br>
            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-4">
                        <div class="card card-padding">
                            <div class="card-header bg-dark text-white">
                                User Profile
                            </div>
                            <div class="card-body">
                                <div class="row" style="padding-top: 5px; padding-left: 5px;">
                                    <div class="col-md-4">
                                        <i class="fas fa-user-circle fa-8x"></i>
                                    </div>
                                    <div class="col-md-8" style="padding-top: 15px;">
                                        <span style="padding-right: 5px; padding-left: 15px;"><strong>Username: </strong>{{$user->name}}</span>
                                        <br>
                                        <span style="padding-right: 5px; padding-left: 15px;"><strong>Email: </strong>{{$user->email}}</span>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card card-padding" style="height: 230px;">
                            <div class="card-header bg-dark text-white">
                                User Control Panel
                            </div>
                            <div class="card-body center-block">
                                <div class="row justify-content-center">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editUsernameModal"
                                            style="width:130px;">Edit Username
                                    </button>
                                    <br>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editEmailModal"
                                            style="margin-top:10px; width:130px;">Edit Email
                                    </button>
                                    <br>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editPasswordModal"
                                            style="margin-top:10px; width:130px;">Edit Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Edit Username-->
                <div class="modal fade" id="editUsernameModal" tabindex="-1" role="dialog"
                     aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUsernameModalLabel">Edit Username</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user.update', $user->id) }}">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                    <fieldset>
                                    <div class="form-group">
                                        <label for="name">New Username:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               aria-describedby="emailHelp" value="{{$user->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="emailForm">Current Password:</label>
                                        <input type="password" class="form-control" id="confirmPasswordForm" name="currentpassword"
                                               aria-describedby="emailHelp" placeholder="Current Password...">
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </div>
                                        </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Edit Email-->
                <div class="modal fade" id="editEmailModal" tabindex="-1" role="dialog"
                     aria-labelledby="editEmailModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEmailModalLabel">Edit Email</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user.update', $user->id) }}">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                    <fieldset>
                                    <div class="form-group">
                                        <label for="emailForm">New Email:</label>
                                        <input type="text" class="form-control" id="emailForm" name="email"
                                               aria-describedby="emailHelp" value="{{$user->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="passwordForm">Current Password:</label>
                                        <input type="password" class="form-control" id="PasswordForm" name="currentpassword"
                                               aria-describedby="emailHelp" placeholder="Current Password...">
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Edit Password-->
                <div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog"
                     aria-labelledby="editPassModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPassModalLabel">Edit Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user.changePassword', $user->id) }}">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                    <fieldset>
                                    <div class="form-group">
                                        <label for="passwordForm">Current Password:</label>
                                        <input type="password" class="form-control" id="passwordForm" name="currentpassword"
                                               aria-describedby="emailHelp" placeholder="Current Password...">
                                    </div>

                                    <div class="form-group">
                                        <label for="passwordForm">New Password:</label>
                                        <input type="password" class="form-control" id="passwordForm" name="password"
                                               aria-describedby="emailHelp" placeholder="Enter New Password...">
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>








            <!-- end of content -->

        </div>
    </div>

</div>
</div>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/bootstrap-slider.min.js"></script>

</body>
</html>