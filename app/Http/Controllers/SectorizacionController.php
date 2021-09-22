<?php

namespace App\Http\Controllers;

use App\Models\sectorizacion;
use Illuminate\Http\Request;

class SectorizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datos['sectorizacions']=Sectorizacion::paginate(5);

        return view('sectorizacion.index',$datos);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sectorizacion.create');
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
            'latitud' => 'required|string|max:15',
            'longitud' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Sectorizacion::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('sectorizacion')->with('Mensaje','Sector Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function show(sectorizacion $sectorizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($idsectorizacion)
    {
        $admin= Sectorizacion::findOrFail($idsectorizacion);

        return view('sectorizacion.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idsectorizacion)
    {
        $campos = [
           'latitud' => 'required|string|max:15',
            'longitud' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Sectorizacion::where('idsectorizacion','=',$idsectorizacion)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('sectorizacion')->with('Mensaje','Sector modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function destroy($idsectorizacion)
    {
        $admin=sectorizacion::findOrFail($idsectorizacion);
        sectorizacion::destroy($idsectorizacion);  
        return redirect('sectorizacion')->with('Mensaje','Sector eliminado');
    }
}
