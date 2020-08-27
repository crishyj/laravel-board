@extends('layouts.app')

@section('content')
<div class="side">
    <span>YOTEI BOARD</span> <i class="fas fa-fw fa-cog"></i>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="slug" class="slug" value="{{Session::get('user_id')}}">                 

                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="description">{{ __('lang.update_board')}}</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$description}}</textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('description')
                                <div class="alert alert-new">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-danger form-control">{{ __('lang.submit')}}</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



