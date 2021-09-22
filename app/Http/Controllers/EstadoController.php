<?php

namespace App\Http\Controllers;

use App\Models\estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['estados']=Estado::paginate(5);

        return view('estado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estado.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Estado::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('estado')->with('Mensaje','Estado Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(estado $idestado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($idestado)
    {
        $admin= Estado::findOrFail($idestado);

        return view('estado.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idestado)
    {
        $campos = [
            'nombre' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Estado::where('idestado','=',$idestado)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('estado')->with('Mensaje','Estado modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($idestado)
    {
        $admin=estado::findOrFail($idestado);
        estado::destroy($idestado);  
        return redirect('estado')->with('Mensaje','Estado eliminado');
    }
}
