<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CreateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $datos['administrador']=user::paginate(5);

        return view('administrador.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombres_usuario' => 'required|max:30',
            'apellidos_usuario' => 'required|max:30',
            'tipodoc_usuario' => 'required|max:30',
            'documento_usuario' => 'required|max:30',
            'correo_usuario' => 'required|max:50',
            'direccion_usuario' => 'required|max:50',
            'telefono_usuario' => 'required|max:10',
            'rol_usuario' => 'required',
            'contrasena_usuario' => 'required|max:100|confirmed',
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        //$datoAdmin=request()->except('_token');

        $user = new User();
        $user->nombres_usuario = $request->nombres_usuario;
        $user->apellidos_usuario = $request->apellidos_usuario;
        $user->tipodoc_usuario = $request->tipodoc_usuario;
        $user->documento_usuario = $request->documento_usuario;
        $user->correo_usuario = $request->correo_usuario;
        $user->telefono_usuario = $request->telefono_usuario;
        $user->direccion_usuario = $request->direccion_usuario;
        $user->rol_usuario = $request->rol_usuario;
    	$user->contrasena_usuario = bcrypt($request->contrasena_usuario); // Se encripta la contraseña usando la función bcrypt().
    	$user->save(); // Se guarda el registro en la base de datos.

        //return response()->json($datoAdmin);
        return redirect('administrador')->with('Mensaje','Usuario Agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin= user::findOrFail($id);

        return view('administrador.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombres_usuario' => 'required|max:30',
            'apellidos_usuario' => 'required|max:30',
            'tipodoc_usuario' => 'required|max:30',
            'documento_usuario' => 'required|max:30',
            'correo_usuario' => 'required|max:50',
            'direccion_usuario' => 'required|max:50',
            'telefono_usuario' => 'required|max:10',
            'rol_usuario' => 'required',
        ];

        $datoAdmin = request()->except(['_token','_method', 'contrasena_usuario', 'contrasena_usuario_confirmation']);

        if($request->contrasena_usuario) {
            $campos['contrasena_usuario'] = 'required|max:100|confirmed';
            $datoAdmin = request()->except(['_token','_method', 'contrasena_usuario_confirmation']);
            $datoAdmin['contrasena_usuario'] = bcrypt($request->contrasena_usuario);
        }

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        user::where('id_usuario','=',$id)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('administrador')->with('Mensaje','Usuario modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $admin=user::findOrFail($id);
        user::destroy($id);
        return redirect('administrador')->with('Mensaje','Usuario eliminado');
    }
}
