@extends('layouts.master')

@section('content')
    <div class="col pt-2">
        <h2>
            Budget
        </h2>
        <br>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    @include('components.graph', ['name' => 'Electricity', 'type' => 'category', 'header' => '<div style="padding-left: 12px">
                                    <p><b>Price Per kW:</b> £0.45</p>

                                    <p><b>Budget For Month:</b> <span style="padding-right:10px;">£' . $userSetting->electricity_budget .'</span><i class="fas fa-pencil-alt"></i></p>

                                    <p><b>Spent This Month:</b> £192</p>
                                </div>'])
                </div>


                <!--Water Budget-->
                <div class="col-md-6">
                    @include('components.graph', ['name' => 'Water', 'type' => 'category', 'header' => '<p><b>Price Per kW:</b> £0.45</p>

                            <p><b>Budget For Month:</b> <span style="padding-right:10px;">£' . $userSetting->water_budget .'</span><i class="fas fa-pencil-alt"></i></p>

                            <p><b>Spent This Month:</b> £192</p>'])
                </div>
            </div>

            <div class="row">

                <!--Gas Chart-->
                <div class="col-md-6">
                    @include('components.graph', ['name' => 'Gas', 'type' => 'category', 'header' => '<p><b>Price Per kW:</b> £0.45</p>

                            <p><b>Budget For Month:</b> <span style="padding-right:10px;">£' . $userSetting->gas_budget .'</span><i class="fas fa-pencil-alt"></i></p>

                            <p><b>Spent This Month:</b> £192</p>'])
                </div>

                <!--Overall Chart-->
                <div class="col-md-6">
                    {{--<div class="card card-padding">--}}
                        {{--<div class="card-header bg-dark text-white">--}}
                            {{--Total Usage (kW)--}}
                        {{--</div>--}}
                        {{--<div class="card-body text-center">--}}
                            {{--<p><b>Price Per kW:</b> £0.45</p>--}}

                            {{--<p><b>Budget For Month:</b> <span style="padding-right:10px;">£300</span><i class="fas fa-pencil-alt"></i></p>--}}

                            {{--<p><b>Spent This Month:</b> £192</p>--}}

                            {{--<button class="btn btn-secondary button-spacing">Custom</button>--}}
                            {{--<button class="btn btn-secondary button-spacing">1 Day</button>--}}
                            {{--<button class="btn btn-warning button-spacing">7 Days</button>--}}
                            {{--<button class="btn btn-secondary button-spacing">30 Days</button>--}}
                            {{--<button class="btn btn-secondary button-spacing">1 Year</button>--}}
                            {{--<button class="btn btn-secondary button-spacing float-right"><i--}}
                                        {{--class="fas fa-download"></i></button>--}}
                            {{--<br>--}}
                            {{--<div class="">--}}
                                {{--<canvas id="totalBudget7D"></canvas>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>


            <!--end of charts-->
        </div>
    </div>
@endsection

@section('footer')
    @include('components.graph-scripts', ['type' => 'category'])
@endsection