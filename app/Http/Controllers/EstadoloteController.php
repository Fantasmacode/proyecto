<?php

namespace App\Http\Controllers;

use App\Models\estadolote;
use Illuminate\Http\Request;

class EstadoloteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datos['estadolotes']=Estadolote::paginate(5);

        return view('estadolote.index',$datos);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadolote.create');
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
            'estado' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Estadolote::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('estadolote')->with('Mensaje','El Estado de lote fue Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function show(estadolote $idestadolote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($idestadolote)
    {
        $admin= Estadolote::findOrFail($idestadolote);

        return view('estadolote.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idestadolote)
    {
        $campos = [
            'estado' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Estadolote::where('idestadolote','=',$idestadolote)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('estadolote')->with('Mensaje','El Estado de lote fue modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function destroy($idestadolote)
    {
        $admin=estadolote::findOrFail($idestadolote);
        estadolote::destroy($idestadolote);  
        return redirect('estadolote')->with('Mensaje','El Estado de lote fue eliminado');
    }
}
