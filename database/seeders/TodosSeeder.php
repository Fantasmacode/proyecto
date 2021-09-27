<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\usuario;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $useradmin=User::create([
        	'nombre' => 'admin mario',
            'documento' => '1085320995',
        	'email' => 'mario@gmail.com',
            'telefono' => '3117235354',
        	'password' => Hash::make('admin'),
        	'rol' => 'capataz',
        ]);
        */

        usuario::create([
            'nombres_usuario' => 'Mario Fernando',
            'apellidos_usuario' => 'Leiton Burgos',
            'tipodoc_usuario' => 'CC',
            'documento_usuario' => '1085320995',
            'correo_usuario' => 'mario@gmail.com',
            'direccion_usuario' => 'avenida',
            'telefono_usuario' => '3117235354',
            'contrasena_usuario' => Hash::make('admin'),
        	'rol_usuario' => 'administrador',
        ]);
    }
}
