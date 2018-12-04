<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;

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
}
