<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cPostal extends Model
{
    protected $fillable = ['codigo','colonia', 'municipio', 'estado',];
}
