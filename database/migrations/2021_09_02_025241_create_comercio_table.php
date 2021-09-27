<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercio', function (Blueprint $table) {
            $table->bigIncrements('id_comercio');
            $table->foreignId('id_proveedores')->nullable()->references('id_proveedores')->on('proveedores')->onDelete(null);
            $table->String('tipo_comercio',15);
            $table->timestamp('fecha_comercio')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comercio');
    }
}
