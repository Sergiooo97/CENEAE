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
        $periodo->nombre = '2020';
        $periodo->duracion  = '40';
        $periodo->año  = '2020';
        $periodo->descripcion  = 'gg';
        $periodo->save();
    }
}
