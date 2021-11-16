<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    public function willaya(){
        return $this ->belongsTo('\App\Models\Willaya');
    }
    public function commune(){
        return $this ->belongsTo('\App\Models\Commune');
    }
    public function centre(){
        return $this ->belongsTo('\App\Models\Centre');
    }

    
}
