<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBovinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovino', function (Blueprint $table) {
            $table->bigIncrements('id_bovino');
            $table->foreignId('id_usuario')->nullable()->references('id_usuario')->on('usuario')->onDelete('cascade');
            $table->foreignId('id_lote')->nullable()->references('id_lote')->on('lote')->onDelete('cascade');
            $table->foreignId('id_comercio')->nullable()->references('id_comercio')->on('comercio')->onDelete('cascade');
            $table->foreignId('id_estadob')->nullable()->references('id_estadob')->on('estado_bovino')->onDelete('cascade');
            $table->foreignId('id_raz')->nullable()->references('id_raz')->on('raza')->onDelete('cascade');
            $table->float('peso_bovino', 10,4);
            $table->integer('edad_bovino');
            $table->String('finalidad_bovino', 15);
            $table->timestamp('fecha_bovino')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bovino');
    }
}
