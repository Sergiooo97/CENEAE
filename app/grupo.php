<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    

    public function scopeGrupo($query, $grupo){
        if($grupo)
        return $query->where('id', 'LIKE', "%$grupo%" );
    }
}
