<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            //$table->enum('accion',['DEPOSITO', 'RETIRO'])->default('DEPOSITO');
            $table->integer('cantidad');
            //$table->string('nuevo')->nullable();
            $table->string('concepto')->nullable();
            $table->string('observaciones');
            $table->integer('status_id');
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
        Schema::dropIfExists('pagos');
    }
}
