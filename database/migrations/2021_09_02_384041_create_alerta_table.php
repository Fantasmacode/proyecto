<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerta', function (Blueprint $table) {
            $table->bigIncrements('id_alerta');
            $table->string('mensaje_alerta', 50);
            $table->foreignId('id_bovino')->nullable()->references('id_bovino')->on('bovino')->onDelete('cascade');
            $table->Date('fecha_alerta')->nullable();
            $table->time('hora_alerta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alerta');
    }
}
