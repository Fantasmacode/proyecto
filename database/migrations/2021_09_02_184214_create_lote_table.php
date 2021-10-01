<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote', function (Blueprint $table) {
            $table->bigIncrements('id_lote');
            $table->foreignId('id_estadol')->nullable()->references('id_estadol')->on('estado_lote')->onDelete('cascade');
            $table->String('area_lote',9);
            $table->String('extension_lote',9);
            $table->String('nombre_lote',50);
            $table->date('fecha_lote');
            $table->date('fcierre_lote')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lote');
    }
}
