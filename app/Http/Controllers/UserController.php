<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
     public function password(){
        return View('user.password');
    }

    public function updatePassword(Request $request){
        $rules = [
            'contrasena' => 'required',
            'contrasena_usuario' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'contrasena.required' => 'El campo es requerido',
            'contrasena_usuario.required' => 'El campo es requerido',
            'contrasena_usuario.confirmed' => 'Las contraseñas no coinciden',
            'contrasena_usuario.min' => 'El mínimo permitido son 6 caracteres',
            'contrasena_usuario.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('user/password')->withErrors($validator)->withInput();
        }
        else{
            if (Hash::check($request->contrasena, Auth::user()->contrasena_usuario)){
                $user = new User;
                $user->where('correo_usuario', '=', Auth::user()->correo_usuario)
                     ->update(['contrasena_usuario' => bcrypt($request->contrasena_usuario)]);
                return redirect('user/password')->with('Mensaje', 'Contraseña cambiada con éxito');
            }
            else
            {
                return redirect('user/password')->with('Error', 'Credenciales incorrectas');
            }
        }
    }
}
