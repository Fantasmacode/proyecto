<?php

namespace App\Http\Controllers;

use App\Models\comercio;
use Illuminate\Http\Request;

class ComercioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['comercios']=Comercio::paginate(5);

        return view('comercio.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comercio.create');
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
            'tipocomercio' => 'required|string|max:15',
            'proveedor' => 'required|string|max:20'

        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Comercio::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('comercio')->with('Mensaje','Comercio Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function show(comercio $idcomercio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function edit($idcomercio)
    {
        $admin= Comercio::findOrFail($idcomercio);

        return view('comercio.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idcomercio)
    {
        $campos = [
            'tipocomercio' => 'required|string|max:15',
            'proveedor' => 'required|string|max:20'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Comercio::where('idcomercio','=',$idcomercio)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('comercio')->with('Mensaje','Comercio modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcomercio)
    {
        $admin=comercio::findOrFail($idcomercio);
        comercio::destroy($idcomercio);  
        return redirect('comercio')->with('Mensaje','Comercio eliminado');
    }
}
