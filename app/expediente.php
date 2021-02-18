<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    
    protected $fillable = [
        'matricula','fecha_ingreso','regularidad','escuela_procedencia','activo','nombre','apellido_materno','peso','fecha_de_nacimiento','sexo','edad',
        'estatura', 'lugar_de_nacimiento','domicilio_actual','telefono_tutor','codigo_postal_turor','municipio','email_tutor','domicilio_actual_tutor','ocupacion_tutor',
        'edad_tutor','ocupacion_tutor','parentesco_con_tutor','quiero_ser','alumno_id'
    ];

}
