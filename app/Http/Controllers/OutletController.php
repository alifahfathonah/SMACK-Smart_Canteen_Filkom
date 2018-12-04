<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;

class OutletController extends Controller
{
    public function menu(){
        // pindah ke model
    	$user = User::where(['id' => auth()->id()])->first();
    	$menu = Menu::where(['user_id' => auth()->id()] )->get();
    	return view('outlet/content_menu', ["user" => $user, "menu" => $menu]);
    }

    public function addmenu(Request $request){
    	$file = $request->file('photo');
    	$name = $request->name;
        $price = $request->price;
        $desc = $request->description;
    	$stock = $request->stock;
    	$user_id = auth()->id();
    	$foto = $file->getClientOriginalName();
    	
    	Menu::create([
            "user_id" => $user_id,
    		"name" => $name,
            "price" => $price,
    		"description" => $desc,
            "stock" => $stock,
    		"photo" => $foto
        ]);
        $file->move('upload', $file->getClientOriginalName());

        $notif = [
            'message' => 'Input Data Success',
            'alert-type' => 'success'
        ];
    	return back()->with($notif);
    }

    public function updatemenu(Request $request){
        $foto = "";
        $name = $request->name;
        $price = $request->price;
        $desc = $request->description;
        $stock = $request->stock;
        if ($request->foto) {
        $file = $request->file('foto');
        $foto = $file->getClientOriginalName();
        Menu::find($request->id)->update([
            "name" => $name,
            "price" => $price,
            "stock" => $stock,
            "description" => $desc,
            "photo" => $foto
        ]);
        $file->move('upload', $file->getClientOriginalName());
        }
        else{
            Menu::find($request->id)->update([
            "name" => $name,
            "price" => $price,
            "stock" => $stock,
            "description" => $desc
        ]);
        }
        
        $notif = [
            'message' => 'Update Data Success',
            'alert-type' => 'success'
        ];
        return back()->with($notif);
    }

    public function deletemenu(Request $request){
        Menu::find($request->id)->delete();

        $notif = [
            'message' => 'Delete Data Success',
            'alert-type' => 'error'
        ];
        return back()->with($notif);
    }
}
