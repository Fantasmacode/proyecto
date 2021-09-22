<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBovinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovinos', function (Blueprint $table) {
            $table->bigIncrements('idbovino');
            $table->String('peso',10);
            $table->String('usuario',20);
            $table->String('estado',10);
            $table->String('edad',10);
            $table->String('raza',30);
            $table->String('finalidad',20);     
            $table->timestamp('fechaingreso')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->String('lote',15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bovinos');
    }
}
