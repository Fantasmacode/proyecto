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
            $table->bigIncrements('id_usuario');
            $table->string('nombres_usuario', 30);
            $table->string('apellidos_usuario', 30);
            $table->enum('tipodoc_usuario', ['CC','TI']);
            $table->string('documento_usuario', 30);
            $table->string('correo_usuario', 50);
            $table->string('direccion_usuario', 50);
            $table->string('telefono_usuario', 10);
            $table->string('contrasena_usuario', 300);
            $table->enum('rol_usuario', ['administrador','gerente','capataz']);
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
