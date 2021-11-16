<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Willayaresult extends Model
{
    use HasFactory;
    public function wilaya(){
        return $this ->belongsTo('\App\Models\Willaya');
    }
    

   
}
