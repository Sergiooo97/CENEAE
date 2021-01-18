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

        //Datos escolares
            $table->string('matricula')->nullable();
            $table->string('fecha_ingreso')->nullable();
            $table->string('regularidad')->nullable();
            $table->string('escuela_procedencia')->nullable();
            $table->string('activo')->nullable();

        // Datos personales
            $table->string('Nombre')->nullable();
            $table->string('Apellido_paterno')->nullable();
            $table->string('Apellido_materno')->nullable();
            $table->string('peso')->nullable();
            $table->date('fecha_de_nacimiento')->nullable();
            $table->string('sexo')->nullable();
            $table->integer('edad')->nullable();
            $table->string('estatura')->nullable();
            $table->string('lugar_de_nacimiento')->nullable();
            $table->string('domicilio_actual')->nullable();
        // datos del tutor
            $table->string('telefono_tutor')->nullable();
            $table->string('codigo_postal_tutor')->nullable();
            $table->string('municipio')->nullable();
            $table->string('email_tutor')->nullable();
            $table->string('domicilio_actual_tutor');
            $table->string('ocupacion_tutor')->nullable();
            $table->string('edad_tutor')->nullable();
            
        //Datos del hogar
            $table->string('num_personas_vivienda')->nullable();
            $table->string('Apellido_paterno_padre')->nullable();
            $table->string('Apellido_materno_padre')->nullable();
            $table->string('Apellido_paterno_madre')->nullable();
            $table->string('Apellido_materno_madre')->nullable();
            $table->string('nombre_de_padre')->nullable();
            $table->integer('edad_padre')->nullable();
            $table->integer('edad_madre')->nullable();
            $table->unsignedBigInteger('alumno_id')->nullable();
            //Relaciones
            $table->foreign('alumno_id')
            ->references('id')
            ->on('alumnos')
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
