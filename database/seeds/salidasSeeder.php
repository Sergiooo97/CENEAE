<?php

use Illuminate\Database\Seeder;
use App\salidas;
class salidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salidas = new salidas();
        $salidas->concepto = 'eventos';
        $salidas->descripcion = 'independencia';
        $salidas->mes = 'septiembre';
        $salidas->periodo_id = '1';
        $salidas->monto = '2000';
        $salidas->save();
    }
}
