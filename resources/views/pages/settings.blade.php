@extends('layouts.master')

@section('content')
    <div class="col pt-2">
        <h2>
            <a href="" data-target="#sidebar" data-toggle="collapse" class="hidden-md-up"></a>
            Settings
        </h2>
        <br>
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">
                    <div class="card card-padding">
                        <div class="card-header bg-dark text-white">
                            User Settings
                        </div>
                        <div class="card-body">
                            <div class="row" style="padding-top: 15px; padding-left: 15px;">
                                <div class="col-md-4">
                                    <i class="fas fa-user-circle fa-8x"></i>
                                </div>
                                <div class="col-md-8" style="padding-top: 5px;">
                                    <span style="padding-right: 5px; padding-left: 15px;"><strong>Username: </strong> BenBob123 </span>
                                    <br>
                                    <span style="padding-right: 5px; padding-left: 15px;"><strong>Email: </strong>ben@bobempires.com</span>
                                    <br>
                                    <span style="padding-right: 5px; padding-left: 15px;"><strong>Gender: </strong>Apache Helicopter</span>
                                    <br>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#editUserModal" style="float:right; margin-top: 37px;">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Edit User Details-->
                <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edit User Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="usernameForm">Username: </label>
                                        <input type="text" class="form-control" id="usernameForm" aria-describedby="emailHelp" placeholder="Enter New Username...">
                                    </div>

                                    <div class="form-group">
                                        <label for="emailForm">Email: </label>
                                        <input type="text" class="form-control" id="emailForm" aria-describedby="emailHelp" placeholder="Enter New Email...">
                                    </div>

                                    <div class="form-group">
                                        <label for="passwordForm">Password: </label>
                                        <input type="text" class="form-control" id="passwordForm" aria-describedby="emailHelp" placeholder="New Password...">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm Password: </label>
                                        <input type="text" class="form-control" id="confirmPassword" aria-describedby="emailHelp" placeholder="Confirm Password...">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-padding" style="">
                        <div class="card-header bg-dark text-white">
                            Budget Settings
                        </div>
                        <div class="card-body">
                            <div>
                                <form>
                                    <div class="form-group">
                                        <p>Electricity Budget:</p>
                                        <input  id="elec" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                                data-slider-max="750" data-slider-step="10" data-slider-value="100"/>
                                        <span style="padding-left: 10px">£<label for="elec" id="elecValue"></label></span>

                                        <p>Water Budget:</p>
                                        <input  id="water" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                                data-slider-max="750" data-slider-step="10" data-slider-value="100"/>
                                        <span style="padding-left: 10px">£<label for="water" id="waterValue"></label></span>

                                        <p>Gas Budget:</p>
                                        <input  id="gas" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                                data-slider-max="750" data-slider-step="10" data-slider-value="100"/>
                                        <span style="padding-left: 10px">£<label for="gas" id="gasValue"></label></span>
                                        <br>
                                        <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-padding">
                        <div class="card-header bg-dark text-white">
                            Notification Settings
                        </div>
                        <div class="card-body">

                            <form>
                                <div class="form-group" style="padding-left: 20px; padding-right: 10px; padding-top: 30px;">
                                    <strong>Enable Notifications:</strong>
                                    <label class="radio-inline" style="padding-right: 10px; padding-left: 10px;"><input type="radio" name="optradio"> Yes</label>
                                    <label class="radio-inline"><input type="radio" name="optradio"> No</label>
                                </div>

                                <div class="form-group" style="padding-left: 20px; padding-right: 10px; padding-top: 10px;">
                                    <strong>Usage Notifications:</strong>
                                    <label class="radio-inline" style="padding-right: 10px; padding-left: 10px;"><input type="radio" name="optradio"> On</label>
                                    <label class="radio-inline"><input type="radio" name="optradio"> Off</label>
                                </div>

                                <div class="form-group" style="padding-left: 20px; padding-right: 10px; padding-top: 10px;">
                                    <strong>Budget Notifications:</strong>
                                    <label class="radio-inline" style="padding-right: 10px; padding-left: 10px;"><input type="radio" name="optradio"> On</label>
                                    <label class="radio-inline"><input type="radio" name="optradio"> Off</label>
                                </div>
                                <button type="submit" class="btn btn-primary" style="float: right">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/bootstrap-slider.min.js"></script>

    <script>

        $('#elec').slider({
            formatter: function(value) {
                $('#elecValue').html(value);
                return 'Current value: ' + value;
            },

        });

        $('#water').slider({
            formatter: function(value) {
                $('#waterValue').html(value);
                return 'Current value: ' + value;
            },

        });

        $('#gas').slider({
            formatter: function(value) {
                $('#gasValue').html(value);
                return 'Current value: ' + value;
            },

        });

        $('#total').slider({
            formatter: function(value) {
                $('#totalValue').html(value);
                return 'Current value: ' + value;
            },

        });

    </script>
@endsection

