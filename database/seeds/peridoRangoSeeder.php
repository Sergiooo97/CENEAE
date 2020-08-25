<?php

use Illuminate\Database\Seeder;
use App\periodos_rangos;
class peridoRangoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodo = new periodos_rangos();
        $periodo->nombre = 'Bimestre 1';
        $periodo->abreviacion  = 'B1';
        $periodo->duracion  = '8';
        $periodo->fecha_inicio  = '2020-01-01';
        $periodo->fecha_fin  = '2020-03-01';
        $periodo->periodo_id  = '1';
        $periodo->save();

        $periodo = new periodos_rangos();
        $periodo->nombre = 'Bimestre 2';
        $periodo->abreviacion  = 'B2';
        $periodo->duracion  = '8';
        $periodo->fecha_inicio  = '2020-01-01';
        $periodo->fecha_fin  = '2020-03-01';
        $periodo->periodo_id  = '1';
        $periodo->save();

        $periodo = new periodos_rangos();
        $periodo->nombre = 'Bimestre 3';
        $periodo->abreviacion  = 'B3';
        $periodo->duracion  = '8';
        $periodo->fecha_inicio  = '2020-01-01';
        $periodo->fecha_fin  = '2020-03-01';
        $periodo->periodo_id  = '1';
        $periodo->save();

        $periodo = new periodos_rangos();
        $periodo->nombre = 'Bimestre 4';
        $periodo->abreviacion  = 'B4';
        $periodo->duracion  = '8';
        $periodo->fecha_inicio  = '2020-01-01';
        $periodo->fecha_fin  = '2020-03-01';
        $periodo->periodo_id  = '1';
        $periodo->save();

        $periodo = new periodos_rangos();
        $periodo->nombre = 'Bimestre 5';
        $periodo->abreviacion  = 'B5';
        $periodo->duracion  = '8';
        $periodo->fecha_inicio  = '2020-01-01';
        $periodo->fecha_fin  = '2020-03-01';
        $periodo->periodo_id  = '1';
        $periodo->save();

        $periodo = new periodos_rangos();
        $periodo->nombre = 'Bimestre 6';
        $periodo->abreviacion  = 'B6';
        $periodo->duracion  = '8';
        $periodo->fecha_inicio  = '2020-01-01';
        $periodo->fecha_fin  = '2020-03-01';
        $periodo->periodo_id  = '1';
        $periodo->save();

    }
}
