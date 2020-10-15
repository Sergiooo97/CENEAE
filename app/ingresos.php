<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingresos extends Model
{
    protected $fillable = [
        'concepto','descripcion','cantidad','mes','periodo_id'
    ];
}
