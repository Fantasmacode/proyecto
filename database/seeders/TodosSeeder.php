<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $useradmin=User::create([
        	'nombre' => 'admin mario',
            'documento' => '1085320995',
        	'email' => 'mario@gmail.com',
            'telefono' => '3117235354',
        	'password' => Hash::make('admin'),
        	'rol' => 'capataz',
        ]);
        //
    }
}
