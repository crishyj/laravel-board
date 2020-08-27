@extends('layouts.app')

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
        </div>
    </div>
</div>
@endsection
