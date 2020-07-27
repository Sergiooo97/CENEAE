<?php

use Illuminate\Database\Seeder;
use App\alumno;
class alumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumno = new alumno();
        $alumno->matricula = 'EXGS971124H1A';
        $alumno->nombres = 'Sergio';
        $alumno->apellido_paterno = 'Eb';
        $alumno->apellido_materno = 'Gallegos';
        $alumno->edad = '22';
        $alumno->fecha_de_nacimiento = '1997-11-24';
        $alumno->curp = 'EXGS971124HYNBLR01';
        $alumno->grado = '1';
        $alumno->grupo = 'A';
        $alumno->municipio = 'Cacalchén';
        $alumno->cp = '97460';
        $alumno->direccion = 'Calle 16#94x17y19';
        $alumno->save();
    }
}
