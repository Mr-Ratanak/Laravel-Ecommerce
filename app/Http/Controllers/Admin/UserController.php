<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $req){
        $validator = $req->validate([
            'name'=>'required|string|max:1024',
            'email'=>'required|unique:users|email',
            'password'=>['required','string','min:8', 'max:20', // Maximum length of 20 characters
            'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',],
            'role_as'=>'required|integer',
            
        ]);
            User::create([
                'name'=>$req->name,
                'email'=>$req->email,
                'password'=>Hash::make($req->password),
                'role_as'=>$req->role_as,
            ]);
            return redirect('admin/user')->with('success','User created!'); 
    }
    public function edit($user_id){
        $user = User::findOrFail($user_id);
        return view('admin.users.edit',compact('user'));
    }
    public function update(Request $req, int $user_id){
        $validator = $req->validate([
            'name'=>'required|string|max:1024',
            'password'=>['required','string',],
            'password_confirmation'=>'required|same:password',
            'role_as'=>'required|integer',
        ],[
            'password_confirmation.same' => 'The password confirmation does not match.',
        ]);
        User::findOrFail($user_id)->update([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
            'role_as'=>$req->role_as,
        ]);
        return redirect('admin/user')->with('success','User updated!'); 
    }
    public function delete(int $user_id){
        User::findOrFail($user_id)->delete();
        return redirect('admin/user')->with('message','User deleted!');
    }

}
