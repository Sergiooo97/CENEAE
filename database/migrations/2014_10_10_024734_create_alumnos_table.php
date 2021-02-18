<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('curp')->nullable();
            $table->string('municipio')->nullable();
            $table->string('cp')->nullable();
           // $table->string('correo');
            $table->string('direccion')->nullable();
            //$table->unsignedBigInteger('grupo_id');
            $table->date('fecha_de_nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->string('sexo')->nullable();
            $table->string('estatura')->nullable();
            $table->string('peso')->nullable();
            $table->string('escuela_procedencia')->nullable();
            $table->string('quiero_ser')->nullable();            
            $table->string('regularidad')->nullable();
            $table->string('fecha_ingreso')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
             //Relaciones
             $table->foreign('status_id')
             ->references('id')
             ->on('statuses')
             ->onDelete('cascade')
             ->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
