<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectorizacion', function (Blueprint $table) {
            $table->bigIncrements('id_sectorizacion');
            $table->foreignId('id_lote')->nullable()->references('id_lote')->on('lote')->onDelete('cascade');
            $table->float('latitud_sectorizacion', 10, 6);
            $table->float('longitud_sectorizacion', 10, 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectorizacion');
    }
}
