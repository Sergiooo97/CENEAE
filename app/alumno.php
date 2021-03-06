<?php

namespace App;
use App\curso;

use Illuminate\Database\Eloquent\Model; 

class alumno extends Model
{

    public function courses()
    {
        return $this->belongsToMany(\App\curso::class, cursos_alumnos::class)->withTimestamps();

    }

    public function grupos()
    {
        return $this->belongsToMany(\App\grupo::class, grupos_alumnos::class)->withTimestamps();

    }

    public function status()
    {
        return $this->belongsToMany(\App\status::class, status_alumnos::class)->withTimestamps();

    }

    public function grades_values()
    {
        return $this->hasMany('App\notas_values');
    }

    protected $fillable = [
        'matricula','nombres','apellido_paterno',
        'apellido_materno','edad','fecha_de_nacimiento',
        'curp','grado','municipio','cp','direccion','grupo_id','grupo',
        'quiero_ser','ndolares', 'nombres_tutor','apellido_paterno_tutor',
        'apellido_materno_tutor','direccion_tutor','escolaridad_tutor',
        'curp_tutor','telefono_tutor','status_id','estatura', 'peso','quiero_ser','escuela_procedencia','fecha_ingreso',
        'sexo','regularidad',
    ];
    //Query Scope
    /**
     * @var mixed|string
     */
    private $ndolares;

    public function scopeNombres($query, $nombres){
        if($nombres)
        return $query->where('alumnos.nombres', 'LIKE', "%$nombres%" );
    }
    public function scopeGrado($query, $grado){
        if($grado)
        return $query->where('alumnos.grado', 'LIKE', "%$grado%" );
    }
    public function scopeGrupo($query, $grupo){
        if($grupo)
        return $query->where('grupos_alumnos.grupo_id', 'LIKE', "%$grupo%" );
    }

}
