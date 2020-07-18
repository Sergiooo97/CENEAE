<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ndolar_lista extends Model
{
    protected $fillable = [
        'id','matricula','nombres','grado', 'grupo','cantidad',
    ];
}
