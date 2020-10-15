<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerToFinanzas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finanzas', function (Blueprint $table) {
            DB::unprepared('
            CREATE TRIGGER update_finanzas_after_salidas
            AFTER INSERT ON salidas
            FOR EACH ROW
            UPDATE finanzas 
            SET 
            monthly_discharge = monthly_discharge + NEW.monto,
            total = total - NEW.monto 
            WHERE periodo_id = NEW.periodo_id AND mes = NEW.mes;

            CREATE TRIGGER update_finanzas_after_ingresos_escuela
            AFTER INSERT ON ingresos
            FOR EACH ROW
            UPDATE finanzas 
            SET 
            ingresos_de_escuela = ingresos_de_escuela + NEW.monto,
            total = total + New.monto
            WHERE periodo_id = NEW.periodo_id AND mes = NEW.mes;
            
            

        ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finanzas', function (Blueprint $table) {
            //
        });
    }
}
