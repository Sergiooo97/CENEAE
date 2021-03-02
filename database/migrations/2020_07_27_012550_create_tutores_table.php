<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->string('nombres')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('direccion')->nullable();
            $table->string('municipio')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('sexo')->nullable();
            $table->integer('edad')->nullable();
            $table->date('fecha_de_nacimiento')->nullable();
            $table->string('escolaridad')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('curp')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('parentesco_con_alumno')->nullable();            

            $table->timestamps();

            //Relaciones
            $table->foreign('alumno_id')
                ->references('id')
                ->on('alumnos')
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
        Schema::dropIfExists('tutores');
    }
}
