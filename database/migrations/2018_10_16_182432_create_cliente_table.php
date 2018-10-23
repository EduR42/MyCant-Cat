<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('IdCliente');
            $table->string('NombreCli', 15);
            $table->string('ApellidosCli', 15);
            $table->string('Password', 100);
            $table->string('EmailCli', 25);
            $table->integer('TelefonoCli');
            $table->string('CalleyNumero', 15);
            $table->string('Colonia', 15);
            $table->integer('IdEstado')->unsigned();
            $table->foreign('IdEstado')->references('IdEstado')->on('estado')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('cliente');
    }
}
