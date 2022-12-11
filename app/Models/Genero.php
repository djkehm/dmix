<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    
    protected $table = 'generos';

    public function genero_mix(){
        return $this->belongsToMany(Mix::class,'mix_genero','genero_id','mix_id');
    }
}
