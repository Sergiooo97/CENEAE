<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
  protected $fillable = ['concepto','alumno_id','cantidad','status_id',];
}
