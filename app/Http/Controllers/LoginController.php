<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginCheck(Request $request){
        $checkUsername = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $checkEmail = [
            'email' => $request->username,
            'password' => $request->password
        ];
        auth()->id();

        if (auth()->attempt($checkUsername) || auth()->attempt($checkEmail) ) {
            $id = auth()->id();
            $user = User::find(['id' => $id])->first();
            if ($user->level == "admin") {
                return redirect(url('admin/outlet'));
            }
            else{
                return redirect(url('outlet'));
            }
        }else{
                return redirect(url('login'));
        }
    }
    public function logout(){
        auth()->logout();
        return redirect(url('login'));
    }
}
