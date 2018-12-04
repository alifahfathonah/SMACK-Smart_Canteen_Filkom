<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App\Pemesanan;

class OutletController extends Controller
{
    public function menu(){
        // pindah ke model
        $menu = Menu::where(['user_id' => auth()->id()] )->get();
        return view('outlet/content_menu', compact('menu'));
    }

    public function order(){
        // pindah ke model
        $pemesanan = Pemesanan::where(['outlet' => auth()->user()->username] )->get();
        return view('outlet/order', compact('pemesanan'));
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

    public function confirmOrder(Request $request){
        $data_pemesanan = [
            "status" => "confirm"
        ];
        $menu = Menu::where("id",$request->menu_id)->first();
        $stock = $menu->stock;
        $sisa = $stock - $request->jumlah;
        $data_menu = [
            "stock" => $sisa
        ];
        
        Pemesanan::where("id",$request->id)->update($data_pemesanan);
        Menu::where("id",$request->menu_id)->update($data_menu);

        $notif = [
            'message' => 'Confirm Ordering Success',
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
