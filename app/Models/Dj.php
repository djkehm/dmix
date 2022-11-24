<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dj extends Model
{
    use HasFactory;

    protected $table = 'djs';

    public function usuario(){
        return $this->hasOne('App\Models\Usuario', 'id_usuario');
    }

    public function mix(){
        return $this->belongsToMany('App\Models\Mix');
    }
}
