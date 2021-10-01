<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados', function (Blueprint $table) {
            $table->bigIncrements('id_traslado');
            $table->foreignId('id_bovino')->nullable()->references('id_bovino')->on('bovino')->onDelete('cascade');
            $table->foreignId('id_moti')->nullable()->references('id_moti')->on('motivo')->onDelete('cascade');
            $table->date('fechas_traslado')->nullable();
            $table->time('horas_traslado')->nullable();
            $table->date('fechar_traslado')->nullable();
            $table->time('horar_traslado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traslados');
    }
}
