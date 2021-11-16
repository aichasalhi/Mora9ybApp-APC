<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centreresult extends Model
{
    use HasFactory;
    public function centre(){
        return $this ->belongsTo('\App\Models\Centre');
    }

    public function commune(){
        return $this ->belongsTo('\App\Models\Commune');
    }
}
