<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ndolar extends Model
{
    protected $fillable = [
        'id','matricula','nombre','accion', 'cantidad','antes','nuevo','comentario',
    ];
}
