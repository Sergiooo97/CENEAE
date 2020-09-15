<?php

use Illuminate\Database\Seeder;
use App\alumno;
class alumnosSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        $alumno = new alumno();
        $alumno->matricula = 'XXEXGS971124HXXXXXX';
        $alumno->nombres = 'Sergio';
        $alumno->apellido_paterno = 'Eb';
        $alumno->apellido_materno = 'Gallegos';
        $alumno->edad = '22';
        $alumno->fecha_de_nacimiento = '1997-11-24';
        $alumno->curp = 'EXGS971124HYNBLR01';
        $alumno->grado = '1';
        $alumno->grupo = 'A';
        $alumno->grupo_id = '1';
        $alumno->municipio = 'Cacalchén';
        $alumno->cp = '97460';
        $alumno->direccion = 'Calle 16#94x17y19';
        $alumno->correo = 'x.xxxxxx@ceneae.com';
        $alumno->save();

        $alumno = new alumno();
        $alumno->matricula = 'XXGXGS951254HXXXXXX';
        $alumno->nombres = 'Jose';
        $alumno->apellido_paterno = 'Ake';
        $alumno->apellido_materno = 'Ek';
        $alumno->edad = '24';
        $alumno->fecha_de_nacimiento = '1995-11-24';
        $alumno->curp = 'AKGS971124HYNBLR01';
        $alumno->grado = '1';
        $alumno->grupo = 'A';
        $alumno->grupo_id = '1';
        $alumno->municipio = 'Cacalchén';
        $alumno->cp = '97460';
        $alumno->direccion = 'Calle 16#94x17y19';
        $alumno->correo = 'x.xxxxxx@ceneae.com';
        $alumno->save();

        $alumno = new alumno();
        $alumno->matricula = 'XXAXGS971124HXXXXXX';
        $alumno->nombres = 'Ana';
        $alumno->apellido_paterno = 'Gallegos';
        $alumno->apellido_materno = 'Eb';
        $alumno->edad = '25';
        $alumno->fecha_de_nacimiento = '1994-12-21';
        $alumno->curp = 'EXGS971124HYNBLR01';
        $alumno->grado = '2';
        $alumno->grupo = 'A';
        $alumno->grupo_id = '2';
        $alumno->municipio = 'Cacalchén';
        $alumno->cp = '97460';
        $alumno->direccion = 'Calle 16#94x17y19';
        $alumno->correo = 'x.xxxxxx@ceneae.com'; 
        $alumno->save();
    }
}
