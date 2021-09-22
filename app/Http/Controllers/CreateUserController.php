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
        //
        $campos = [
            'nombre' => 'required|string|max:50',
            'documento' => 'required|string|unique:users|max:10', 
            'email' => 'required|string|unique:users|max:50',
            'rol' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'password' => 'required|string|max:20',
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        //$datoAdmin=request()->except('_token');

        $user = new User();
    	$user->nombre = $request->nombre;
    	$user->documento = $request->documento;
    	$user->rol = $request->rol;
    	$user->email = $request->email;
        $user->telefono = $request->telefono;
    	$user->password = bcrypt($request->password); // Se encripta la contraseña usando la función bcrypt().
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
            'nombre' => 'required|string|max:50',
            'documento' => 'required|string|unique:users|max:10', 
            'email' => 'required|string|unique:users|max:50',
            'rol' => 'required|string|max:50',
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        user::where('id','=',$id)->update($datoAdmin);

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
