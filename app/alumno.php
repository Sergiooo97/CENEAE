<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $fillable = [
        'id','matricula','nombres','apellido_paterno', 'apellido_materno','edad','fecha_de_nacimiento','curp','grado','grupo', 'email', 'nombres_tutor','apellido_paterno_tutor','apellido_materno_tutor','direccion_tutor','escolaridad_tutor','curp_tutor','telefono_tutor',
    ];
}
