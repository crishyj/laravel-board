<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function username()
    {
        return 'slug';
    }

    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            $user_id = auth()->user()->id;
            session(['user_id' => $user_id]);
            $slug = auth()->user()->slug;
            $id = auth()->user()->id;
            return '/'.$slug.'/edit';
        }
        return '/';
    }

    /** return redirect()->route('logout');
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function user_login($slug){
        if (User::where('slug', '=', $slug)->exists()) {
            return view('auth.statusLogin', ["slug"=>$slug]);
        }
        else{
            return view('auth.nonAuth', ["slug"=>$slug]);
        }

        
       
        // $slug = explode('https://phpenguin.com/', $slug)[1];
        // 
    }
  
}
