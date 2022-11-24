<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Usuario extends Authenticable
{
    use HasFactory;

    protected $table = 'usuarios';

    public function dj(){
        return $this->hasOne('App\Models\Dj', 'id_usuario');
    }

    public function solicitud_venta(){
        return $this->hasMany('App\Models\Solicitud_venta', 'id_usuario');
    }
}
