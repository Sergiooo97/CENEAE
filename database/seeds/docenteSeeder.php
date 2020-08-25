<?php

use Illuminate\Database\Seeder;
use App\docente;

class docenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docente = new docente();
        $docente->matricula = '16070021';
        $docente->RFC = 'EXGS880326';
        $docente->nombres = 'Rafel';
        $docente->apellido_paterno = 'Eb';
        $docente->apellido_materno = 'Gallegos';
        $docente->edad = '22';
        $docente->fecha_de_nacimiento = '97-11-24';
        $docente->curp= 'EXGS971124';
        $docente->municipio= 'Cacalchén, Yucatán.';
        $docente->cp= '97460';
        $docente->direccion= 'calle 16 x 17 y 19';
        $docente->telefono= '9911074558';
        $docente->correo= 'rafael@maestro.com';
        $docente->save();

        $docente = new docente();
        $docente->matricula = '16070022';
        $docente->RFC = 'GXGS880326';
        $docente->nombres = 'Ana';
        $docente->apellido_paterno = 'Eb';
        $docente->apellido_materno = 'Gallegos';
        $docente->edad = '25';
        $docente->fecha_de_nacimiento = '97-11-24';
        $docente->curp= 'GXGS971124';
        $docente->municipio= 'Cacalchén, Yucatán.';
        $docente->cp= '97460';
        $docente->direccion= 'calle 16 x 17 y 19';
        $docente->telefono= '9911075896';
        $docente->correo= 'ana@maestro.com';
        $docente->save();
    }
}
