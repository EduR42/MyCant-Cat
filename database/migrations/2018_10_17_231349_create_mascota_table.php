<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('mascota', function (Blueprint $table) {
            $table->increments('IdMascota');
            $table->integer('IdCliente')->unsigned();
            $table->foreign('IdCliente')->references('IdCliente')->on('cliente')->onDelete('cascade');
            $table->string('NombreMas',15);
            $table->string('Raza',20);
            $table->string('Foto',50);
            $table->string('NombreMas2',15);
            $table->string('Raza2',20);
            $table->string('Foto2',50);
            $table->integer('IdTipoMas')->unsigned();
            $table->foreign('IdTipoMas')->references('IdTipoMas')->on('tipomascota')->onDelete('cascade');
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
        Schema::dropIfExists('mascota');
    }
}
