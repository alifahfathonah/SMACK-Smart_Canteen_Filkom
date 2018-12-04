<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('content/register');
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
                $notif = [
                    'message' => 'Login Success',
                    'alert-type' => 'success'
                ];
                return redirect(url('admin/outlet'))->with($notif);
            }
            else{
                if ($user->status == "confirm") {
                    $notif = [
                        'message' => 'Login Success',
                        'alert-type' => 'success'
                    ];
                    return redirect(url('outlet'))->with($notif);
                }
                elseif ($user->status == "reject") {
                    $notif = [
                        'message' => 'This Account was rejected',
                        'alert-type' => 'error'
                    ];
                    return redirect(url('login'))->with($notif);
                }
                else
                {
                    $notif = [
                        'message' => 'This Account not Confirm',
                        'alert-type' => 'error'
                    ];
                    return redirect(url('login'))->with($notif);
                }
                
            }
        }else{
                $notif = [
                    'message' => 'Login Failed',
                    'alert-type' => 'error'
                ];
                return redirect(url('login'))->with($notif);
        }
    }
    public function input_register(Request $request){

        $validator = $this->validate($request,[
            'username' => 'required|unique:users,username',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:3',
            'confirm_password' => 'required_with:password|same:password|min:3',
            'photo' => 'required'
        ]);

        $file = $request->photo;
        $foto = $file->getClientOriginalName();
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => "outlet",
            'photo' => $foto
        ];
        User::create($data);
        $file->move('foto_user', $file->getClientOriginalName());
        $notif = [
            'message' => 'Register Success',
            'alert-type' => 'success'
        ];
        return back()->with($notif);
    }
    public function logout(){
        auth()->logout();
        return redirect(url('login'));
    }
}
