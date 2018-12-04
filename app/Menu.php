<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $fillable = [
        'user_id','name', 'price', 'description', 'stock', 'photo','created at','updated_at'
    ];
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
