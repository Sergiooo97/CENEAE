<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerToAlumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            DB::unprepared('
            CREATE TRIGGER insertar_ndolar
            AFTER INSERT ON ndolars 
            FOR EACH ROW 
            IF (New.accion="deposito")  
            THEN
            UPDATE alumnos SET ndolares=ndolares + NEW.cantidad 
            WHERE matricula=NEW.matricula;

            UPDATE ndolar_listas SET cantidad=cantidad + NEW.cantidad 
            WHERE matricula=NEW.matricula;
           
            ELSE
            UPDATE alumnos SET ndolares=ndolares - NEW.cantidad 
            WHERE matricula=NEW.matricula;

            UPDATE ndolar_listas SET cantidad=cantidad - NEW.cantidad 
            WHERE matricula=NEW.matricula;
            END IF;
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
        Schema::table('alumnos', function (Blueprint $table) {
            //
        });
    }
}
