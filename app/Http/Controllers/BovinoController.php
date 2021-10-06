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
    public function index(Request $request)
    {
        $bovinos = Bovino::whereDoesntHave('baja')->with('estado', 'raza', 'lote', 'comercio', 'usuario')
            ->where( function($query) use($request){
                if ($request->fid_raz) {
                    return $query->where('id_raz',$request->fid_raz);
                } else {
                    return $query;
                }
            })
            ->where( function($query) use($request){
                if ($request->ffinalidad) {
                    return $query->where('finalidad_bovino',$request->ffinalidad);
                } else {
                    return $query;
                }
            })
            ->where( function($query) use($request){
                if ($request->festado) {
                    return $query->where('id_estadob',$request->festado);
                } else {
                    return $query;
                }
            })
            ->where( function($query) use($request){
                if ($request->fid_bovino) {
                    return $query->where('id_bovino',$request->fid_bovino);
                } else {
                    return $query;
                }
            })
            ->where( function($query) use($request){
                if ($request->fid_lote) {
                    return $query->where('id_lote',$request->fid_lote);
                } else {
                    return $query;
                }
            })
            ->paginate(10);
        $selected_id = [];
        $selected_id['fid_raz'] = $request->fid_raz;
        $selected_id['ffinalidad'] = $request->ffinalidad;
        $selected_id['festado'] = $request->festado;
        $selected_id['fid_bovino'] = $request->fid_bovino;
        $selected_id['fid_lote'] = $request->fid_lote;

        $razas = raza::all();
        $lotes = lote::all();

        return view('bovino.index', compact('bovinos', 'razas', 'lotes', 'selected_id'));  //
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
        $request->request->add(['id_comercio' => comercio::where('tipo_comercio', 'Compra')->first()->id_comercio]);
        $campos = [
            'id_raz' => 'required',
            'peso_bovino' => 'required|numeric|between:1,1100',
            'edad_bovino' => 'required|integer|between:1,22',
            'finalidad_bovino' => 'required|string|max:15',
            'id_estadob' => 'required',
            'id_lote' => 'required',
            //'id_comercio' => 'required',
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
            //'id_comercio' => 'required',
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
