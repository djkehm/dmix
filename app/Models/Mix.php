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
        return $this->belongsToMany(Interprete::class, 'mix_interpretes', 'mix_id','intreprete_id')
            ->withPivot(''); 
    }
}
