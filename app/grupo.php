<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    

    public function scopeGrupo($query, $grupo){
        if($grupo)
        return $query->where('grupos_alumnos.grupo_id', 'LIKE', "%$grupo%" );
    }
}
