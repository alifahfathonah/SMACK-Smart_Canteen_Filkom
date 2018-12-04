<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
	protected $fillable = [
        'menu_id','outlet','member', 'status', 'jumlah' ,'created at','updated_at'
    ];
    public function menu(){
    	return $this->belongsTo(Menu::class);
    }
}
