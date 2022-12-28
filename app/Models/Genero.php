<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mix;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'generos';
    
    public $timestamps = false;

    public function mixes(){
        return $this->belongsToMany(Mix::class,'mix_generos','genero_id','mix_id');
    }
}
