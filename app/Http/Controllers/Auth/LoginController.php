<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
// use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect('admin/dashboard')->with('message','Welcome to dashboard');
        }else if(Auth::user()->role_as == '0'){
            return redirect('/');
        }else{
            return redirect('/login')->with('status','Access Deneid. As you are not admin!');
        }
    }

    // public function login(Request $request)
    // {
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     $credentials = ['email' => $email, 'password' => $password];

    //     if (Auth::attempt($credentials)) {
    //         if (Auth::user()->role_as == 1) {
    //             return redirect()->intended('admin/dashboard')->with('message','Welcome to dashboard');
    //         } else {
    //             return redirect()->intended('/');
    //         }
    //     } else {
    //         return back()->withErrors(['email' => 'Invalid credentials']);
    //     }
    // }







    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
