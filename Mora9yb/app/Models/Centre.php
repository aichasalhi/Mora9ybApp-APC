<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;
    protected $table = 'centres';
    protected $fillable = ['nom_centre','num_centre','commune_id'];

   public function willaya(){
    return $this ->belongsTo('\App\Models\Willaya');
}
   public function commune(){
    return $this ->belongsTo('\App\Models\Commune');
}

public function offices(){

    return $this -> hasMany('\App\Models\Office');
}
public function ctdresults(){

    return $this -> hasMany('\App\Models\Ctdresul');
}

public function centreresult(){
    return $this ->hasOne('\App\Models\Centreresult');
}


}

