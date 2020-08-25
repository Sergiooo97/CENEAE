<?php

use Illuminate\Database\Seeder;
use App\cursos_alumnos;
class curso_alumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $periodo = new cursos_alumnos();
        $periodo->curso_id = '1';
        $periodo->alumno_id  = '1';
        $periodo->save();

        $periodo = new cursos_alumnos();
        $periodo->curso_id = '2';
        $periodo->alumno_id  = '1';
        $periodo->save();

        $periodo = new cursos_alumnos();
        $periodo->curso_id = '1';
        $periodo->alumno_id  = '2';
        $periodo->save();

        $periodo = new cursos_alumnos();
        $periodo->curso_id = '2';
        $periodo->alumno_id  = '2';
        $periodo->save();
    }
}
