<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('formulario');
            $table->string('mantenimiento');
            $table->string('equipo');
            $table->string('codigo');
            $table->string('frecuencia');
            $table->string('mes');
            $table->string('horaInicio');
            $table->string('horaFinal');
            $table->string('tiempoTotal');
            $table->string('actividades',500);
            $table->string('observaciones',500);
            $table->string('materiales',500);
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
        Schema::dropIfExists('ordenes');
    }
}
