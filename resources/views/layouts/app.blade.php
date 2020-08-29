<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
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
        $hour = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[0];
        $min = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[1];
        $sec = (int)explode(":", explode(" ", $currenttime->toDateTimeString())[1])[2];

        $current = Carbon\Carbon::create($year, $month, $date, $hour, $min, $sec);
        $start = Carbon\Carbon::create($year, $month, $date, 8, 0, 0);
        $end = Carbon\Carbon::create($year, $month, $date, 19, 0, 0);           
    @endphp
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @else
                    <a class="navbar-brand" href="{{route('status_index', Session::get('user_id'))}}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @endguest
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                @if ($current->greaterThan($start) && $current->lessThan($end))
                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{route('status_index', Session::get('user_id'))}}">DASHBOARD</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('status_edit', Session::get('user_id'))}}">EDIT STATUS</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('board_edit', Session::get('user_id'))}}">EDIT BOARD</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->slug }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                @else
               
           
                @endif
                   
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/js/sb-admin-2.js') }}" defer></script>
<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


@yield('after_script')
</html>
