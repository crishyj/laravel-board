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
        <div class="side">
            <span>YOTEI BOARD</span> <i class="fas fa-fw fa-cog"></i>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('lang.make_board')}}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="privacy py-2 px-2">
                                        Privacy text will be insert here
                                        <br>
                                        <br>
                                    </div>
                                </div>                       

                                <div class="form-group">
                                    <label for="default_status">{{ __('lang.default_status')}}</label>

                                    <div class="stauts_panel mt-3">
                                        {{ __('lang.init1')}}
                                    </div>

                                    <div class="stauts_panel mt-3">
                                        {{ __('lang.init2')}}
                                    </div>

                                    <div class="stauts_panel mt-3">
                                        {{ __('lang.init3')}}
                                    </div>
                                </div>

                            
                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger form-control">
                                        {{ __('lang.create')}}
                                    </button>
                                </div>
                            </form>
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
                                I am still meeting now.    
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
