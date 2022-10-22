<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salidas extends Model
{

    protected $fillable = [
        'concepto','descripcion','cantidad','mes','periodo_id'
    ];
    //
}
