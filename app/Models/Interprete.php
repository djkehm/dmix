<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interprete extends Model
{
    use HasFactory;
    protected $table = 'intrepetes';
    
    public function mix(){
        return $this->belongsToMany(Mix::class, 'mix_interpretes', 'interprete_id','mix_id'); 
    }
}
