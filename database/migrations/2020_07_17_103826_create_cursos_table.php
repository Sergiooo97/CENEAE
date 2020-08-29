<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('clave');
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->enum('grado', ['1', '2', '3', '4', '5', '6']);
            $table->enum('grupo', ['A', 'B']);
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->references('id')->on('docentes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('periodo_id')->nullable();
            $table->foreign('periodo_id')->references('id')->on('periodos')
                ->onDelete('cascade');
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
        Schema::dropIfExists('cursos');
    }
}
