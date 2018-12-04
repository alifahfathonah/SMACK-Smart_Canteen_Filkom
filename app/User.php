<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'photo', 'level', 'created at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function menu(){
        return $this->hasMany(Menu::class);
    }
}
