@extends('layouts.app')

@section('content')
<div class="side">
   <a href="{{route('status_index', Session::get('user_id'))}}"> <span>YOTEI BOARD</span> <i class="fas fa-fw fa-cog"></i></a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('lang.edit_status')}}</div>
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="slug" class="slug" value="{{Session::get('user_id')}}">
                    <div class="table-responsive">                       
                        <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                        {{-- <thead>
                            <tr>
                                <th style="display: none">
                                    Order
                                </th>
                                <th style="width:10px; padding: 5, 0;">
                                
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    
                                </th>
                               
                            </tr>
                        </thead>     --}}
                        <tbody style="border: none;">
                            @foreach ($inits as $item)
                                <tr>
                                    <td style="display: none">
                                        {{$item->order}}
                                    </td>
                                    <td class="delete_td">                                      
                                        <a href="#"class="btn btn-danger mb-2 mr-1  btn-sm btn-delete"><i class="fa fa-trash"></i></a>    
                                    </td>
                                    <td class="status_td">
                                        {{$item->status}}
                                    </td>
                                    <td class="move_td">
                                        <i class="fa fa-sort"></i>
                                    </td>
                                   
                                </tr>
                            @endforeach   
                        </tbody>                   
                        <tbody id="sortable" style="border: none;">       
                            @foreach ($statuses as $item)
                                <tr class="ui-state-default row1" data-id="{{$item->id}}">
                                    <td style="display: none">
                                        {{$item->order}}
                                    </td>
                                    <td class="delete_td">                                      
                                        <a href="{{route('status_delete', $item->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-danger mb-2 mr-1  btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-trash"></i></a>    
                                    </td>
                                    <td class="status_td">
                                        {{$item->name}}
                                    </td>
                                    <td class="move_td">
                                        <i class="fa fa-sort"></i>
                                    </td>
                                   
                                </tr>
                            @endforeach

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-5">
              
                <div class="card-header">{{ __('lang.add_status')}}</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" name="name" id="name" class="form-control" required>
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

@section('after_script')
    <script>
        $(document).ready(function(){
            $('.navbar-brand').css('display', 'none');
            $( "#sortable" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update:function(){
                    sortOrderToServer();
                }
            });

            function sortOrderToServer(){
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });
                
                $.ajax({
                    type: "POST", 
                    dataType: "json", 
                    url: "{{route('status_store', ['slug'])}}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                        console.log(response);
                        } else {
                        console.log(response);
                        }
                    }
                });
            }
        });
    </script>
    
@endsection

