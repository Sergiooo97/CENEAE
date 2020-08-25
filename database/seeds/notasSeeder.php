<?php

use Illuminate\Database\Seeder;
use App\notas;
class notasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $periodo = new notas();
        $periodo->nombre = 'Español';
        $periodo->descripcion  = 'gg';
        $periodo->curso_id  = '1';
        $periodo->save();

        $periodo = new notas();
        $periodo->nombre = 'Matemáticas';
        $periodo->descripcion  = 'gg';
        $periodo->curso_id  = '2';
        $periodo->save();

        $periodo = new notas();
        $periodo->nombre = 'Geografía';
        $periodo->descripcion  = 'gg';
        $periodo->curso_id  = '3';
        $periodo->save();
    }
}
