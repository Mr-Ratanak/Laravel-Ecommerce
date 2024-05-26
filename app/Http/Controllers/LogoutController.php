<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function userLogout(Request $request)
    {
        if(Auth::user()-> role_as == '0'){
            Auth::guard('web')->logout(); // For regular users
            return redirect()->to('/login');
        }

    }
    public function adminLogout(Request $request)
    {
        if(Auth::user() && Auth::user()->role_as == '1'){
            Auth::logout();
            // Auth::guard('web')->logout(); // For admins
            return redirect('/login');
        }
    }

    // public function logout()
    // {
    //     if (Auth::user()->role_as == 1) {
    //         Auth::guard('web')->logout(); // Logout for admins
    //     } else {
    //         Auth::logout(); // Standard logout for regular users
    //     }

    //     return redirect('/login');
    // }



}
