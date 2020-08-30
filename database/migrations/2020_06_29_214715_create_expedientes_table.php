<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Apellido_paterno');
            $table->string('Apellido_materno');
            $table->string('peso');
            $table->date('fecha_de_nacimiento');
            $table->string('sexo');
            $table->integer('edad');
            $table->string('estatura');
            $table->string('lugar_de_nacimiento');
            $table->string('domicilio_actual');
            $table->string('telefono_tutor');
            $table->string('codigo_postal');
            $table->string('email_tutor');
            $table->string('num_personas_vivienda');
            $table->string('nombre_de_padre');
            $table->string('nombre_de_madre');
            $table->integer('edad_padre');
            $table->integer('edad_madre');
            $table->unsignedBigInteger('alumno_id')->nullable();
            //Relaciones
            $table->foreign('alumno_id')
            ->references('id')
            ->on('grupos')
            ->onDelete('cascade')
            ->onUpdate('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
}
