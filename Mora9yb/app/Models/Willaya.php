<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Willaya extends Model
{
    use HasFactory;
    public function communes(){

        return $this -> hasMany('\App\Models\Commune');
    }
    public function centres(){

        return $this -> hasMany('\App\Models\Centre');
    }
    public function offices(){

        return $this -> hasMany('\App\Models\Office');
    }

    public function willayaresult(){
        return $this ->hasOne('\App\Models\Willayaresult');
    }
    public function communeresults(){

        return $this -> hasMany('\App\Models\Communeresult');
    }
}
