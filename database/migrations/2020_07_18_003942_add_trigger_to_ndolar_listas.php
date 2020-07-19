<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerToNdolarListas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ndolar_listas', function (Blueprint $table) {
            DB::unprepared('
            CREATE TRIGGER insertar_ndolar_listas
            AFTER INSERT ON alumnos 
            FOR EACH ROW 
            INSERT INTO ndolar_listas(matricula, nombres, grado, grupo, cantidad)
            VALUES(NEW.matricula, CONCAT(NEW.nombres, " ", NEW.apellido_paterno, " ",NEW.apellido_materno), NEW.grado, NEW.grupo, NEW.ndolares);        
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
        Schema::table('ndolar_listas', function (Blueprint $table) {
            //
        });
    }
}