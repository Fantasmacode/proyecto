<?php

namespace App\Http\Controllers;

use App\Models\bovino;
use App\Models\motivo;
use App\Models\traslado;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['traslados']=Traslado::with('bovino.raza', 'motivo')->paginate(10);

        return view('traslado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bovinos = bovino::whereDoesntHave('baja')->whereDoesntHave('traslados')->orWhereHas('traslados', function($query){
            $query->whereNotNull('fechar_traslado')->whereNotNull('horar_traslado');
        })->get();
        //return dd($bovinos);
        $motivos = motivo::all();
        return view('traslado.create', compact('bovinos', 'motivos'));
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
            'id_bovino' => 'required',
            'id_moti' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();
        $request->request->add(['fechas_traslado' => Carbon::now()->format('Y-m-d')]);
        $request->request->add(['horas_traslado' => Carbon::now()->format('H:i:s')]);

        $bovino = bovino::findOrFail($request->id_bovino);
        $bovino->update(['id_estadob' => 2]);

        $datoAdmin=request()->except('_token');
        Traslado::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('traslado')->with('Mensaje','Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function show(traslado $id_traslado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($id_traslado)
    {
        $admin= Traslado::findOrFail($id_traslado);
        $bovinos = bovino::whereDoesntHave('baja')->whereDoesntHave('traslados')->orWhereHas('traslados', function($query){
            $query->whereNull('fechar_traslado')->whereNull('horar_traslado');
        })->get();
        $motivos = motivo::all();

        return view('traslado.edit',compact('admin', 'bovinos', 'motivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_traslado)
    {
        $campos = [
            'id_bovino' => 'required',
            'id_moti' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datoAdmin=request()->except(['_token','_method']);

        $bovinonuevo = bovino::findOrFail($request->id_bovino);
        $bovinonuevo->update(['id_estadob' => 2]);

        $traslado = traslado::findOrFail($id_traslado);
        $bovinoantiguo = bovino::findOrFail($traslado->id_bovino);
        $bovinoantiguo->update(['id_estadob' => 1]);

        Traslado::where('id_traslado','=',$id_traslado)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('traslado')->with('Mensaje','Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_traslado)
    {
        $admin=traslado::findOrFail($id_traslado);
        traslado::destroy($id_traslado);
        return redirect('traslado')->with('Mensaje','Traslado eliminado');
    }
}





