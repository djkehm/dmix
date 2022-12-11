<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mix extends Model
{
    use HasFactory;

    protected $table = 'mixes';

    public function dj(){
        return $this->belongsTo('App\Models\Dj');
    }

    public function interprete(){
        return $this->hasOne('App\Models\Interprete');
    }
    public function genero_mix(){
        return $this->belongsToMany(Genero::class,'mix_genero','mix_id','genero_id');
    }
}
