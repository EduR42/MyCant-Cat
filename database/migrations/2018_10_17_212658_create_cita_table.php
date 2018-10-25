<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('cita', function (Blueprint $table) {
            $table->increments('IdCita');
            $table->string('NombreCli',20);
            $table->string('ApellidosCli',20);
            $table->date('FechaCita',15);
            $table->integer('IdEstadoMas')->unsigned();
            $table->foreign('IdEstadoMas')->references('IdEstadoMas')->on('estadomascota')->onDelete('cascade');
            $table->string('NombreMas',20);
            $table->integer('IdTipoMas')->unsigned();
            $table->foreign('IdTipoMas')->references('IdTipoMas')->on('tipomascota')->onDelete('cascade');
            $table->string('MotivoCit',50);
            $table->integer('IdCliente')->unsigned();
            $table->foreign('IdCliente')->references('IdCliente')->on('cliente')->onDelete('cascade');
            $table->integer('IdTipoCit')->unsigned();
            $table->foreign('IdTipoCit')->references('IdTipoCit')->on('tipocita')->onDelete('cascade');
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
        Schema::dropIfExists('cita');
    }
}
