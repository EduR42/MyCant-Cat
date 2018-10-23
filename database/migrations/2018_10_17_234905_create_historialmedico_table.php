<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialmedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialmedico', function (Blueprint $table) {
            $table->increments('IdHistorial');
            $table->integer('IdCliente')->unsigned();
            $table->foreign('IdCliente')->references('IdCliente')->on('cliente')->onDelete('cascade');
            $table->integer('IdMascota')->unsigned();
            $table->foreign('IdMascota')->references('IdMascota')->on('mascota')->onDelete('cascade');
            $table->string('Mascota', 15);
            $table->string('MotivoCita', 15);
            $table->date('FechaCita');
            $table->string('Diagnostico', 50);
            $table->string('Tratamiento', 50);
            $table->date('ProximaC', 15);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historialmedico');
    }
}
