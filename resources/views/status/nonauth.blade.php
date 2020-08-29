
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
