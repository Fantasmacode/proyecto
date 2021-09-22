<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id', 4);
            $table->string('nom_res', 30);
            $table->string('ape_res', 30);
            $table->string('tip_doc', 30);
            $table->string('num_res', 20);
            $table->string('tel_res', 20);
            $table->string('cor_res', 40);
            $table->string('nom_rol', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
