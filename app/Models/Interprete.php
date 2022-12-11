<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interprete extends Model
{
    use HasFactory;
    protected $table = 'interpretes';
    
    public function mix(){
        return $this->belongsTo('App\Models\Mix'); 
    }
}
