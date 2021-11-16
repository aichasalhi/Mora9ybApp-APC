<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table = 'communes';
    protected $fillable = ['nom_commune','num_commune','wilaya_id'];
    public function wilaya(){
        return $this ->belongsTo('\App\Models\Willaya');
    }
    public function centres(){

        return $this -> hasMany('\App\Models\Centre');
    }
    public function offices(){

        return $this -> hasMany('\App\Models\Office');
    }
    public function cmdresults(){

        return $this -> hasMany('\App\Models\Cmdresul');
    }
    public function communeresult(){
        return $this ->hasOne('\App\Models\Communeresult');
    }

    public function centreresults(){

        return $this -> hasMany('\App\Models\Centreresult');
    }
   
}
