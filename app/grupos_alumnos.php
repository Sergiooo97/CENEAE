<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\alumno;
class grupos_alumnos extends Model
{
    protected $table = 'grupos_alumnos';
    protected $fillable = ['grupo_id','alumno_id',];

    public function students()
    {
        return $this->belongsToMany(alumno::class)->withTimestamps();

    }
}
