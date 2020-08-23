<?php

use Illuminate\Database\Seeder;
use App\periodo;
class peridodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodo = new periodo();
        $periodo->nombre = '2019-2020';
        $periodo->año_inicio  = '2019';
        $periodo->año_fin  = '2020';
        $periodo->descripcion  = '1920';
        $periodo->save();
    }
}
