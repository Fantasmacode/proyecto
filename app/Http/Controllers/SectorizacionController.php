<?php

namespace App\Http\Controllers;

use App\Models\sectorizacion;
use App\Models\lote;
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
        $datos['sectorizacions']=Sectorizacion::with('lote')->paginate(5);

        return view('sectorizacion.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lotes = lote::all();
        return view('sectorizacion.create', compact('lotes'));
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
            'id_lote' => 'required',
            'latitud_sectorizacion' => 'required',
            'longitud_sectorizacion' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

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
    public function edit($id_sectorizacion)
    {
        $admin = Sectorizacion::with('lote')->findOrFail($id_sectorizacion);
        $lotes = lote::all();

        return view('sectorizacion.edit',compact('admin', 'lotes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_sectorizacion)
    {
        $campos = [
            'id_lote' => 'required',
            'latitud_sectorizacion' => 'required',
            'longitud_sectorizacion' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Sectorizacion::where('id_sectorizacion','=',$id_sectorizacion)->update($datoAdmin);

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
    public function destroy($id_sectorizacion)
    {
        $admin=sectorizacion::findOrFail($id_sectorizacion);
        sectorizacion::destroy($id_sectorizacion);
        return redirect('sectorizacion')->with('Mensaje','Sector eliminado');
    }
}
