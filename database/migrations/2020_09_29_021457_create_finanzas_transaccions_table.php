<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanzasTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finanzas_transaccions', function (Blueprint $table) {
            $table->id();
            $table->string('concepto')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('mes')->nullable();
            $table->integer('periodo_id')->nullable();
            $table->integer('monto')->nullable();
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
        Schema::dropIfExists('finanzas_transaccions');
    }
}
