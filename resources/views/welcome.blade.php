<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
    <body>
        @php
            $currenttime = Carbon\Carbon::now();
            $year = (int)explode("-", explode(" ", $currenttime->toDateTimeString())[0])[0];
            $month = (int)explode("-", explode(" ", $currenttime->toDateTimeString())[0])[1];
            $date = (int)explode("-", explode(" ", $currenttime->toDateTimeString())[0])[2];
            $hour = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[0]+8;
            $min = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[1];
            $sec = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[2];

            $current = Carbon\Carbon::create($year, $month, $date, $hour, $min, $sec);
            $start = Carbon\Carbon::create($year, $month, $date, 8, 0, 0);
            $end = Carbon\Carbon::create($year, $month, $date, 19, 0, 0);           
        @endphp

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @if ($current->greaterThan($start) && $current->lessThan($end))
                            <ul class="navbar-nav ml-auto">
                                @auth
                                    <li class="nav-item">
                                        <a href="{{ url('/{slug}') }}">DASHBOARD</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{route('status_edit', Session::get('user_id'))}}">EDIT STATUS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('board_edit', Session::get('user_id'))}}">EDIT BOARD</a>
                                    </li> --}}
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        @else

                        @endif
                    </div>
                </div>
            </nav>
    
            <main class="py-4">
                <div class="side">
                    <span>YOTEI BOARD</span> <i class="fas fa-fw fa-cog"></i>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                           
                            @if ($current->greaterThan($start) && $current->lessThan($end))
                                @auth
                                    <div class="card">
                                        <div class="card-header">Welcome</div>                                
                                        <div class="card-body">
                                            <div>                                            
                                                Welcome visit your panel.
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="card">
                                        <div class="card-header">STATUS</div>
                                        <div class="card-body">
                                            <div class="panel_01">
                                                I am 11meeting now.    
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-5">
                                        <div class="card-header">NOTE</div>
                                        <div class="card-body">
                                            <div class="panel">
                                                Please register and login to your status board.
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            @else
                                <div class="card">
                                    <div class="card-header">STATUS</div>
                                    <div class="card-body">
                                        <div class="panel_01">
                                            I am meeting now.    
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
                            @endif
                            
                        </div>
                    </div>
                </div>
            </main>
        </div>
       
    </body>
</html>
