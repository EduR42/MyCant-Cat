<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('calificacion', function (Blueprint $table) {
            $table->increments('IdCalificacion');
            $table->integer('IdCliente')->unsigned();
            $table->foreign('IdCliente')->references('IdCliente')->on('cliente')->onDelete('cascade');
            $table->string('NombreCli', 15);
            $table->string('NivelServicio', 15);
            $table->integer('Satisfaccion');
            $table->string('Sugerencia', 50);
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
        Schema::dropIfExists('calificacion');
    }
}
