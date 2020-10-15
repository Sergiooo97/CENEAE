<?php

use Illuminate\Database\Seeder;
use App\finanzas_transaccion;
class transaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingresos = new finanzas_transaccion();
        $ingresos->concepto = 'colegiaturas';
        $ingresos->descripcion = 'colegiatura septiembre';
        $ingresos->mes = 'septiembre';
        $ingresos->periodo_id = '1';
        $ingresos->monto = '0';
        $ingresos->save();
        $ingresos = new finanzas_transaccion();
        $ingresos->concepto = 'internet';
        $ingresos->descripcion = 'cobro de internet';
        $ingresos->mes = 'septiembre';
        $ingresos->periodo_id = '1';
        $ingresos->monto = '0';
        $ingresos->save();
        $ingresos = new finanzas_transaccion();
        $ingresos->concepto = 'desayunos';
        $ingresos->descripcion = 'pago de desayunos';
        $ingresos->mes = 'septiembre';
        $ingresos->periodo_id = '1';
        $ingresos->monto = '0';
        $ingresos->save();
    }
}
