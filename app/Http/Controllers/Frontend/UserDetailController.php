<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDetailController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function veiwProfile(){
        return view('frontend.user.profile');
    }
    public function profileUpdate(Request $request){
        $request->validate([
            'username'=>['required','string'],
            'phone'=>['required','digits:10'],
            'flat_no'=>['required'],
            'address'=>['required','string','max:499']
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name'=>$request->username,
        ]);
        $user->UserDetail()->updateOrCreate(
            [
                'user_id'=>$user->id,
            ],
            [
                'username'=>$request->username,
                'phone'=>$request->phone,
                'flat_no'=>$request->flat_no,
                'address'=>$request->address,
            ]
        );
        return redirect()->back()->with('success','Profile has been updated!');
    }
    public function createPassword(){
        return view('frontend.user.change-password');
    }
    public function passwordStore(Request $req){
        $req->validate([
            'current_password'=>['required','string','min:8'],
            'password'=>['required','string','min:8','confirmed'],
        ]);
        $currentUserPassStatus = Hash::check($req->current_password,Auth::user()->password);
        if($currentUserPassStatus){
            User::findOrFail(Auth::user()->id)->update([
                'password'=>$req->password,
            ]);
            return redirect()->back()->with('success','Password has been Change.');
        }
        return redirect()->back()->with('error','Failed to change password!!!');
    }

}
