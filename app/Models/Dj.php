<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dj extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'djs';

    public function usuario(){
        return $this->hasOne('App\Models\Usuario', 'id_usuario');
    }

    public function mix(){
        return $this->belongsToMany('App\Models\Mix');
    }
}
