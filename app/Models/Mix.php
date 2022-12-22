<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;
use Illuminate\Database\Eloquent\SoftDeletes;
class Mix extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'mixes';
    public $timestamps = false;
    public function dj(){
        return $this->belongsTo('App\Models\Dj');
    }
    
    public function generos(){
        return $this->belongsToMany(Genero::class,'mix_generos','mix_id','genero_id');
    }

    public function solicitud(){
        return $this->belongsToMany('App\Models\Solicitud_venta');
    }

    public function interpretes(){
        return $this->belongsToMany(Interprete::class,'mix_interpretes','mix_id','interprete_id');
    }
}
