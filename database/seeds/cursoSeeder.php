<?php

use Illuminate\Database\Seeder;
use App\curso;
class cursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $periodo = new curso();
        $periodo->nombre = 'ESPAÑOL';
        $periodo->clave  = 'ESPAÑOL1A';
        $periodo->grado  = '1';
        $periodo->grupo  = 'A';
        $periodo->periodo_id  = '1';
        $periodo->save();

        $periodo = new curso();
        $periodo->nombre = 'MATEMÁTICAS';
        $periodo->clave  = 'MATE1A';
        $periodo->grado  = '1';
        $periodo->grupo  = 'A';
        $periodo->periodo_id  = '1';
        $periodo->save();
    }
}
