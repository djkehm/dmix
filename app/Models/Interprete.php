<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interprete extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'interpretes';
    public $timestamps = false;


    public function mixes(){
        return $this->belongsToMany(Mix::class,'mix_interpretes','interprete_id','mix_id');
    }
}
