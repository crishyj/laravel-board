@extends('layouts.app')

@section('content')
<div class="side">
    <span>YOTEI BOARD</span> <i class="fas fa-fw fa-cog"></i>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="slug" class="col-form-label text-md-right">{{ __('lang.slug')}}</label>
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-danger form-control">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
