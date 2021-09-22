<?php

namespace App\Http\Controllers;

use App\Models\ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['ubicacions']=Ubicacion::paginate(5);

        return view('ubicacion.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ubicacion.create');    }

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

        Ubicacion::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('ubicacion')->with('Mensaje','Ubicacion Agregada con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show(ubicacion $idubicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($idubicacion)
    {
        $admin= Ubicacion::findOrFail($idubicacion);

        return view('ubicacion.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idubicacion)
    {
        $campos = [
            'latitud' => 'required|string|max:15',
            'longitud' => 'required|string|max:10'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Ubicacion::where('idubicacion','=',$idubicacion)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('ubicacion')->with('Mensaje','Ubicacion modificada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($idubicacion)
    {
        $admin=ubicacion::findOrFail($idubicacion);
        ubicacion::destroy($idubicacion);  
        return redirect('ubicacion')->with('Mensaje','Ubicacion eliminada');
    }
}
