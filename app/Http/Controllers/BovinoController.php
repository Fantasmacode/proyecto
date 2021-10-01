<?php

namespace App\Http\Controllers;

use App\Models\bovino;
use App\Models\comercio;
use App\Models\estadobovino;
use App\Models\lote;
use App\Models\raza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BovinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['bovinos']=Bovino::whereDoesntHave('baja')->with('estado', 'raza', 'lote', 'comercio', 'usuario')->paginate(10);

        return view('bovino.index',$datos);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = estadobovino::all();
        $razas = raza::all();
        $lotes = lote::all();
        $comercios = comercio::all();
        return view('bovino.create', compact('estados', 'razas', 'lotes', 'comercios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['id_usuario' => Auth::user()->id_usuario]);
        $campos = [
            'id_raz' => 'required',
            'peso_bovino' => 'required|numeric|between:1,1100',
            'edad_bovino' => 'required|integer|between:1,22',
            'finalidad_bovino' => 'required|string|max:15',
            'id_estadob' => 'required',
            'id_lote' => 'required',
            'id_comercio' => 'required',
            'id_usuario' => 'required',
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Bovino::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('bovino')->with('Mensaje','Bovino Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function show(bovino $id_bovino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($id_bovino)
    {
        $admin= Bovino::findOrFail($id_bovino);
        $estados = estadobovino::all();
        $razas = raza::all();
        $lotes = lote::all();
        $comercios = comercio::all();

        return view('bovino.edit',compact('admin', 'estados', 'razas', 'lotes', 'comercios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_bovino)
    {
        $campos = [
            'id_raz' => 'required',
            'peso_bovino' => 'required|numeric|between:1,1100',
            'edad_bovino' => 'required|integer|between:1,22',
            'finalidad_bovino' => 'required|string|max:15',
            'id_estadob' => 'required',
            'id_lote' => 'required',
            'id_comercio' => 'required',
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Bovino::where('id_bovino','=',$id_bovino)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('bovino')->with('Mensaje','Bovino modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bovino)
    {
        $admin=bovino::findOrFail($id_bovino);
        bovino::destroy($id_bovino);
        return redirect('bovino')->with('Mensaje','Bovino eliminado');
    }
}
