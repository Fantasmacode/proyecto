<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\usuario;
use Illuminate\Support\Facades\Hash;
use DB;

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

        DB::table('estado_lote')->insert(array(
            array(
                'nombre_estadol' => 'Abierto',
            ),
            array(
                'nombre_estadol' => 'Cerrado',
            ),
            array(
                'nombre_estadol' => 'Pendiente',
            ),
        ));

        DB::table('estado_bovino')->insert(array(
            array(
                'nombre_estadob' => 'Activo',
            ),
            array(
                'nombre_estadob' => 'Inactivo',
            ),
        ));

        DB::table('motivo')->insert(array(
            array(
                'motivo_moti' => 'Llevar a zona de ordeño',
            ),
            array(
                'motivo_moti' => 'Llevar a veterinario',
            ),
        ));
    }
}
