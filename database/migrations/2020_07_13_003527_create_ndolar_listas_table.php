<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNdolarListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ndolar_listas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id')->index();
            $table->string('matricula')->nullable();
            $table->string('nombres')->nullable();
            $table->string('grado')->nullable();
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->integer('cantidad');


            //Relaciones
            $table->foreign('alumno_id')
            ->references('id')
            ->on('alumnos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('ndolar_listas');
    }
}
