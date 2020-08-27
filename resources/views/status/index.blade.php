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
                    <div class="form-group board_panel">
                        <label for="url">{{ __('lang.url')}}</label>
                        <input type="text" name="" id="" class="form-control" readonly value= {{ Auth::user()->slug }}>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <div class="form-group board_panel">
                        <label for="">{{ __('lang.update_status')}}</label>
                        <select name="update_status" id="" class="form-control">
                            @foreach ($inits as $item)
                                <option value="{{$item->status}}">{{$item->status}}</option>    
                            @endforeach
                            @foreach ($statuses as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>    
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="card mt-5">
                <div class="card-body">
                    <div class="form-group board_panel">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('status_edit', Session::get('user_id'))}}">
                                    <button class="btn btn-danger form-control">{{ __('lang.edit_status')}}</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('board_edit', Session::get('user_id'))}}">
                                    <button class="btn btn-danger form-control">{{ __('lang.edit_board')}}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mt-5">
                <div class="card-body">
                    <div class="form-group board_panel">
                        <a href="/logout">
                            <button class="btn btn_success1 form-control mt-3">
                                {{ __('lang.logout')}}
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <div class="form-group board_panel">
                        <a href="{{route('user_delete', Session::get('user_id'))}}">
                            <button class="btn btn_success1 form-control mt-3">
                                {{ __('lang.delete')}}
                            </button>
                        </a>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
