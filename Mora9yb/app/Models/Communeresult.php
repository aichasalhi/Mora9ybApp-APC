<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communeresult extends Model
{
    use HasFactory;
    public function commune(){
        return $this ->belongsTo('\App\Models\Commune');
    }


    public function centreresults(){

        return $this -> hasMany('\App\Models\Centreresult');
    }

    public function willaya(){
        return $this ->belongsTo('\App\Models\Willaya');
    }
}
