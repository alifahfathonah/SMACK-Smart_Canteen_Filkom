<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App\Pemesanan;

class HomeController extends Controller
{
    public function home(){
    	$menu = Menu::get();
    	return view('content/home', ["menu" => $menu]);
    }
    public function product_detail($id){
    	$menu = Menu::where('id',$id)->get();
    	return view('content/product_detail', ["menu" => $menu]);
    }
    public function pemesanan(Request $Request){
    	$data = [
    		"menu_id" => $Request->id,
    		"outlet" => $Request->outlet,
    		"member" => $Request->member,
    		"jumlah" => $Request->jumlah,
    		"status" => "new",
    	];
    	Pemesanan::create($data);
    	$notif = [
            'message' => 'Oder Success',
            'alert-type' => 'success'
        ];

        return back()->with($notif);
    }
}
