<?php

use Illuminate\Database\Seeder;
use App\finanzas;
class finanzasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $finanzas = new finanzas();
        $finanzas->presupuesto_mensual = '15000';
        $finanzas->ingresos_de_escuela = '10000';
        $finanzas->monthly_discharge = '5000';
        $finanzas->total = '20000';
        $finanzas->mes = 'Agosto';
        $finanzas->periodo_id = '1';

        $finanzas->save();
        $finanzas = new finanzas();
        $finanzas->presupuesto_mensual = '10000';
        $finanzas->ingresos_de_escuela = '25000';
        $finanzas->monthly_discharge = '10000';
        $finanzas->total = '25000';
        $finanzas->mes = 'Septiembre';
        $finanzas->periodo_id = '1';
        $finanzas->save();

        $finanzas = new finanzas();
        $finanzas->presupuesto_mensual = '0';
        $finanzas->ingresos_de_escuela = '0';
        $finanzas->monthly_discharge = '0';
        $finanzas->total = '0';
        $finanzas->mes = 'Octubre';
        $finanzas->periodo_id = '1';
        $finanzas->save();
    }
}
