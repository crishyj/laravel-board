<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\User;
use App\Models\Status;
use App\Models\Init;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function index($slug){
        config(['site.page' => 'dashboard']);
        $inits = Init::all();
        $user_id = Session::get('user_id');
        $statuses = Status::where('user_id', '=', $user_id)->get()->sortBy('order');
        $selecteds = Status::where('user_id', '=', $user_id)->where('selected', '=', 1)->get();
        return view('status.index', compact('statuses', 'selecteds', 'inits'));
    }

    public function update(Request $request){       
        $statuses = Status::where('user_id', '=', session('user_id'))->get();
        foreach ($statuses as $item) {
            $item->update(['selected' => 0]);      
        }
        $id = $request->get('id');
        $state = Status::find($id);
        $state->update(['selected' => 1]);   
        return response()->json('success');
    }

    public function delete($id){
        $options = User::find($id);
        $user_id = $options->id;
        $statuses = Status::where('user_id', '=', $user_id)->get();
        foreach ($statuses as $item) {
            $item->delete();
        }
        $options->delete();
        return redirect('/logout');
    }

    public function updateStatus(){
        config(['site.page' => 'edit_status']);
        $inits = Init::all();
        $user_id = Session::get('user_id');
        $statuses = Status::where('user_id', '=', $user_id)->get()->sortBy('order');
        return view('status.editStatus', compact('inits', 'statuses'));
    }

    public function storeStatus(Request $request, $slug){
        $i = 0;
        if($request->ajax()){
            $statuses = Status::where('user_id', '=', session('user_id'))->get();
            foreach ($statuses as $item) {
                foreach ($request->order as $order) {
                    if($order['id'] == $item->id){
                        $item->update(['order' => $order['position']]);                    
                    }
                }
            }
            return response('Update Success.', 200);
        }else{
            $validate_array = array(
                'name'=>'required',            
            );
            $request->validate($validate_array); 
    
            $statuses = Status::where('user_id', '=', session('user_id'))->orWhere('order')->get('order');
          
            if($statuses->count() == 0){
               $order = 1;
            }
            else
            {
                $order = ($statuses->max())['order']+1;
            }       
            if ((Status::where('user_id', '=',  session('user_id'))->get())->contains('name', $request->get('name'))){
                echo "
                <script>
                    alert('This Status already exist!');
                    window.history.back(-1);
                </script>";
            }else{
                $options = new Status([
                    'name' => $request->get('name'),
                    'order' => $order,
                    'user_id' => session('user_id'),
                ]);
                $options->save();
                return redirect('/'.session('user_id').'/edit_status');
            }    
        }
          
    }

    public function deleteStatus($id){
        $options = Status::find($id);
        if (!$options) {
            return back()->withErrors(['delete' => 'Something went wrong.']);
        }       
        $options->delete();
        return redirect('/'.session('user_id').'/edit_status');
    }

    public function updateBoard(){
        config(['site.page' => 'edit_board']);
        $user_id = Session::get('user_id');
        $user = User::find($user_id);
        $description = $user['description'];
        return view('status.editBoard', ["description"=>$description]);
    }

    public function storeBoard(Request $request){
        $request->validate([
            'description' => 'required|min:8',
        ]);

        $user_id = Session::get('user_id');
        $options = User::find($user_id);      
        $options->description = $request->get('description');
        $options->save();
        $description = $options['description'];
        return view('status.editBoard', ["description"=>$description]);
    }

    public function viewstate($slug){
        $user  = User::where('slug', '=', $slug)->first();
        $user_board = $user['description'];
        $user_id = $user['id'];
        $selecteds = Status::where('user_id', '=', $user_id)->where('selected', '=', 1)->get();
        if(count($selecteds) == 0){
            $selcted_status = "I am in meeting";
        }
        else{
            $selcted_status = $selecteds[0]['name'];
        }        
        return view('status.nonauth', ["selectd_status" => $selcted_status, "user_board"=>$user_board, "slug" => $slug]);
    }

   
}
