<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    public function outlet(){
        $admin = User::find(auth()->id())->first();
    	$user = User::where(['level' => 'outlet'])->get();
    	return view('admin/content_outlet',['user' => $user, 'admin' => $admin]);
    }
    public function add_user(Request $Request){
    	$file = $Request->file('photo');
    	$foto = $file->getClientOriginalName();

    	$data = [
    		"username" => $Request->username,
    		"email" => $Request->email,
    		"password" => bcrypt($Request->password),
    		"level" => "outlet",
    		"photo" => $foto
    	];

    	User::create($data);
    	$file->move('foto_user', $file->getClientOriginalName());
    	$notif = [
            'message' => 'Input Data Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);

    }
    public function edit_user(Request $request){
        $foto;
        $data;
        if ($request->photo) {
        $file = $request->file('photo');
        $foto = $file->getClientOriginalName();
            if ($request->password) {
                $data = [
                    "username" => $request->username,
                    "email" => $request->email,
                    "password" => bcrypt($request->password),
                    "photo" => $foto
                ];
            }else{
                $data = [
                    "username" => $request->username,
                    "email" => $request->email,
                    "photo" => $foto
                ];
            }
        
            User::find($request->id)->update($data);
            $file->move('foto_user', $file->getClientOriginalName());
        }
        else{
            if ($request->password) {
                $data = [
                    "username" => $request->username,
                    "email" => $request->email,
                    "password" => bcrypt($request->password)
                ];
            }else{
                $data = [
                    "username" => $request->username,
                    "email" => $request->email
                ];
            }
        
            User::find($request->id)->update($data);
        }
        
        $notif = [
            'message' => 'Update Data Success',
            'alert-type' => 'success'
        ];
        return back()->with($notif);
    }
    public function deleteOutlet(Request $request){
        User::find($request->id)->delete();
        $notif = [
            'message' => 'Delete Data Success',
            'alert-type' => 'error'
        ];

        return back()->with($notif);
    }
}
