<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function dato_envio(){
        return $this->belongsTo(Dato_envio::class);
    }

    public function compras(){
        return $this->hasMany(Compra::class);
    }

    public function tarjetas(){
        return $this->hasMany(Tarjeta::class);
    }

    public function ordenes(){
        return $this->hasMany(Orden::class);
    }
}
