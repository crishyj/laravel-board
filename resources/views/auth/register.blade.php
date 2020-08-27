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
