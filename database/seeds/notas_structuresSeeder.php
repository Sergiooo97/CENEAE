<?php

use Illuminate\Database\Seeder;
use App\notas_structures;
class notas_structuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodo = new notas_structures();
        $periodo->nombre = 'P1';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P2';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P3';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P4';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P5';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P6';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P7';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P8';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P9';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P10';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P11';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P12';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P13';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P14';
        $periodo->nota_id  = '1';
        $periodo->save();
        $periodo = new notas_structures();
        $periodo->nombre = 'P15';
        $periodo->nota_id  = '1';
        $periodo->save();
    }
}
