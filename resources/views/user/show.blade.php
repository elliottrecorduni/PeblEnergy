@extends('layouts.master')

@section('content')

    <div class="col pt-2">
        <h2>
            <a href="" data-target="#sidebar" data-toggle="collapse" class="hidden-md-up"></a>
            User Profile
        </h2>
        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-padding">
                    <div class="card-header bg-dark text-white">
                        User Profile
                    </div>
                    <div class="card-body">
                        <div class="row" style="padding-top: 5px; padding-left: 5px;">
                            <div class="col-4">
                                <i class="fas fa-user-circle fa-8x"></i>
                            </div>
                            <div class="col-12 col-md-12 col-lg-8" style="padding-top: 15px;">
                                <span style="padding-right: 5px; padding-left: 15px;"><strong>Username: </strong>{{$user->name}}</span>
                                <br>
                                <span style="padding-right: 5px; padding-left: 15px;"><strong>Email: </strong>{{$user->email}}</span>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-padding" style="height: 230px;">
                    <div class="card-header bg-dark text-white">
                        User Control Panel
                    </div>
                    <div class="card-body center-block">
                        <div class="row justify-content-center">
                            <button class="btn btn-primary col-12" data-toggle="modal" data-target="#editUsernameModal"
                                    style="width:130px;">Edit Username
                            </button>
                            <br>
                            <button class="btn btn-primary col-12" data-toggle="modal" data-target="#editEmailModal"
                                    style="margin-top:10px; width:130px;">Edit Email
                            </button>
                            <br>
                            <button class="btn btn-primary col-12" data-toggle="modal" data-target="#editPasswordModal"
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
                                    <input type="password" class="form-control" id="confirmPasswordForm"
                                           name="currentpassword"
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


@endsection