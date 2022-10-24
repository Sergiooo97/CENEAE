<?php

use Illuminate\Database\Seeder;
use App\ingresos;
class ingresosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingresos = new ingresos();
        $ingresos->concepto = 'colegiaturas';
        $ingresos->descripcion = 'colegiatura septiembre';
        $ingresos->mes = 'septiembre';
        $ingresos->periodo_id = '1';
        $ingresos->monto = '6000';
        $ingresos->save();
        $ingresos = new ingresos();
        $ingresos->concepto = 'internet';
        $ingresos->descripcion = 'cobro de internet';
        $ingresos->mes = 'septiembre';
        $ingresos->periodo_id = '1';
        $ingresos->monto = '900';
        $ingresos->save();
        $ingresos = new ingresos();
        $ingresos->concepto = 'desayunos';
        $ingresos->descripcion = 'pago de desayunos';
        $ingresos->mes = 'septiembre';
        $ingresos->periodo_id = '1';
        $ingresos->monto = '1000';
        $ingresos->save();
    }
}
