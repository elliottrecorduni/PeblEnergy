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
                <div class="col-md-6">
                    <div class="card card-padding" style="">
                        <div class="card-header bg-dark text-white">
                            Budget Settings
                        </div>
                        <div class="card-body">
                            <div>
                                <form method="POST" action="{{route('settings.update')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <p>Electricity Budget:</p>
                                        <input  id="elec" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                                data-slider-max="750" data-slider-step="10" data-slider-value="{{isset($userSetting->electricity_budget) ? $userSetting->electricity_budget : 100 }}" name="elec_budget"/>
                                        <span style="padding-left: 10px">£<label for="elec" id="elecValue"></label></span>

                                        <p>Water Budget:</p>
                                        <input  id="water" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                                data-slider-max="750" data-slider-step="10" data-slider-value="{{isset($userSetting->water_budget) ? $userSetting->water_budget : 100 }}" name="water_budget"/>
                                        <span style="padding-left: 10px">£<label for="water" id="waterValue"></label></span>

                                        <p>Gas Budget:</p>
                                        <input  id="gas" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                                data-slider-max="750" data-slider-step="10" data-slider-value="{{isset($userSetting->gas_budget) ? $userSetting->gas_budget : 100 }}" name="gas_budget"/>
                                        <span style="padding-left: 10px">£<label for="gas" id="gasValue"></label></span>

                                        <div class="form-group">

                                            <label for="kwh_price">Price per kWh</label>
                                            <input type="text" class="form-control" id="kwh_price" name="kwh_price" placeholder="Price per kWh"
                                                   value="{{isset($userSetting->kwh_price) ? $userSetting->kwh_price : 0 }}">
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-padding">
                        <div class="card-header bg-dark text-white">
                            Notification Settings
                        </div>
                        <div class="card-body">

                            <form>
                                <div class="form-group" style="padding-left: 20px; padding-right: 10px; padding-top: 30px;">
                                    <strong>Enable Notifications:</strong>
                                    <label class="radio-inline" style="padding-right: 10px; padding-left: 10px;"><input type="radio" name="optnotifications"> Yes</label>
                                    <label class="radio-inline"><input type="radio" name="optnotifications"> No</label>
                                </div>

                                <div class="form-group" style="padding-left: 20px; padding-right: 10px; padding-top: 10px;">
                                    <strong>Usage Notifications:</strong>
                                    <label class="radio-inline" style="padding-right: 10px; padding-left: 10px;"><input type="radio" name="optusage"> On</label>
                                    <label class="radio-inline"><input type="radio" name="optusage"> Off</label>
                                </div>

                                <div class="form-group" style="padding-left: 20px; padding-right: 10px; padding-top: 10px;">
                                    <strong>Budget Notifications:</strong>
                                    <label class="radio-inline" style="padding-right: 10px; padding-left: 10px;"><input type="radio" name="optbudget"> On</label>
                                    <label class="radio-inline"><input type="radio" name="optbudget"> Off</label>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/css/bootstrap-slider.min.css">

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

