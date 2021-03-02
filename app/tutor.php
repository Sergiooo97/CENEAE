<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tutor extends Model
{
    protected $table = 'tutores';

    protected $fillable = [
        'matricula','nombres','apellido_paterno',
        'apellido_materno','edad','fecha_de_nacimiento',
        'curp','grado','municipio','cp','direccion','grupo_id','grupo',
        'quiero_ser','ndolares', 'nombres_tutor','apellido_paterno_tutor',
        'apellido_materno_tutor','direccion_tutor','escolaridad_tutor',
        'curp_tutor','telefono_tutor','status_id','estatura', 'peso','quiero_ser','escuela_procedencia','fecha_ingreso',
        'sexo','regularidad',
    ];

}
