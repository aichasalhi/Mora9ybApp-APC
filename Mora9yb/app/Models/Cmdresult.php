<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmdresult extends Model
{
    use HasFactory;
    
    public function commune(){
        return $this ->belongsTo('\App\Models\Commune');
    }
}
