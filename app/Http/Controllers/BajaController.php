<?php

namespace App\Http\Controllers;

use App\Models\baja;
use Illuminate\Http\Request;

class BajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['bajas']=Baja::paginate(5);

        return view('baja.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baja.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'bovino' => 'required|string|max:30',
            'motivo' => 'required|regex:/^[\pL\s\-]+$/u|max:30'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Baja::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('baja')->with('Mensaje','Baja Agregada con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function show(baja $idbaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function edit($idbaja)
    {
        $admin= Baja::findOrFail($idbaja);

        return view('baja.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idbaja)
    {
        $campos = [
            'bovino' => 'required|string|max:30',
            'motivo' => 'required|regex:/^[\pL\s\-]+$/u|max:30'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Baja::where('idbaja','=',$idbaja)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('baja')->with('Mensaje','Baja modificada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function destroy($idbaja)
    {
        $admin=baja::findOrFail($idbaja);
        baja::destroy($idbaja);  
        return redirect('baja')->with('Mensaje','baja eliminada');
    }
}
