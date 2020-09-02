@php
$currenttime = Carbon\Carbon::now();
$year = (int)explode("-", explode(" ", $currenttime->toDateTimeString())[0])[0];
$month = (int)explode("-", explode(" ", $currenttime->toDateTimeString())[0])[1];
$date = (int)explode("-", explode(" ", $currenttime->toDateTimeString())[0])[2];
$hour = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[0];
$min = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[1];
$sec = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[2];

$current = Carbon\Carbon::create($year, $month, $date, $hour, $min, $sec);
$start = Carbon\Carbon::create($year, $month, $date, 8, 0, 0);
$end = Carbon\Carbon::create($year, $month, $date, 19, 0, 0); 

@endphp


@if ($current->greaterThan($start) && $current->lessThan($end))

    @extends('layouts.app')

    @section('content')
        @php
            $login_url = "/".$slug."/login";
        @endphp
        <div class="side">
            <a href={{$login_url}}>  <span>YOTEI BOARD</span> <i class="fas fa-fw fa-cog"></i></a>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">STATUS</div>
                        <div class="card-body">
                            <div class="panel_01">
                                {{$selectd_status}}
                            </div>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">NOTE</div>
                        <div class="card-body">
                            <div class="panel">
                            {{$user_board}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@else

    @section('content')
        <div class="side">
            <span>YOTEI BOARD</span> <i class="fas fa-fw fa-cog"></i>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">STATUS</div>
                        <div class="card-body">
                            <div class="panel_01">
                                Please call me tomorrow.
                            </div>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">NOTE</div>
                        <div class="card-body">
                            <div class="panel">
                                I am busy today, so please email to me.
                                <br>
                                <br>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@endif 

