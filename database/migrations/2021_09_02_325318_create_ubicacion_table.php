<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->bigIncrements('id_ubicacion');
            $table->foreignId('id_bovino')->nullable()->references('id_bovino')->on('bovino')->onDelete('cascade');
            $table->float('latitud_ubicacion', 10, 6);
            $table->float('longitud_ubicacion', 10, 6);
            $table->date('fecha_ubicacion')->nullable();
            $table->time('hora_ubicacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion');
    }
}
