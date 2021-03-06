<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('RFC');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('edad');
            $table->date('fecha_de_nacimiento');
            $table->string('curp');
            $table->string('municipio');
            $table->string('cp');
            $table->string('direccion');
            $table->string('correo');
            $table->string('telefono');
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->timestamps();
             //Relaciones
             $table->foreign('grupo_id')
             ->references('id')
             ->on('grupos')
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
        Schema::dropIfExists('docentes');
    }
}
