<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Usuario extends Authenticable
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';
    public function dj(){
        return $this->hasOne('App\Models\Dj', 'id_usuario');
    }

    public function solicitud(){
        return $this->belongsToMany('App\Models\Solicitud_venta');
    }

    
}
