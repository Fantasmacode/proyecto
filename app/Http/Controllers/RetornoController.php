<?php

namespace App\Http\Controllers;

use App\Models\bovino;
use App\Models\motivo;
use App\Models\retorno;
use App\Models\traslado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RetornoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['traslados']=Traslado::with('bovino.raza', 'motivo')->whereNotNull('fechar_traslado')->whereNotNull('horar_traslado')->paginate(10);

        return view('retorno.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bovinos = bovino::whereDoesntHave('baja')->get();
        $motivos = motivo::all();
        return view('retorno.create', compact('bovinos', 'motivos'));
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
        $request->request->add(['fechar_traslado' => Carbon::now()->format('Y-m-d')]);
        $request->request->add(['horar_traslado' => Carbon::now()->format('H:i:s')]);

        $datoAdmin=request()->except('_token');
        Traslado::insert($datoAdmin);

        $bovino = bovino::findOrFail($request->id_bovino);
        $bovino->update(['id_estadob' => 1]);

        //return response()->json($datoAdmin);
        return redirect('retorno')->with('Mensaje','Agregado con Exito');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\retorno  $retorno
     * @return \Illuminate\Http\Response
     */
    public function show(retorno $id_traslado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\retorno  $retorno
     * @return \Illuminate\Http\Response
     */
    public function edit($id_traslado)
    {
        $admin= Traslado::findOrFail($id_traslado);
        $bovinos = bovino::whereDoesntHave('baja')->get();
        $motivos = motivo::all();


        return view('retorno.edit',compact('admin', 'bovinos', 'motivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\retorno  $retorno
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
        $bovinonuevo->update(['id_estadob' => 1]);

        $traslado = traslado::findOrFail($id_traslado);
        $bovinoantiguo = bovino::findOrFail($traslado->id_bovino);
        $bovinoantiguo->update(['id_estadob' => 2]);

        traslado::where('id_traslado','=',$id_traslado)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('retorno')->with('Mensaje','Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\retorno  $retorno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_traslado)
    {
        $admin=traslado::findOrFail($id_traslado);
        traslado::destroy($id_traslado);
        return redirect('retorno')->with('Mensaje','Traslado eliminado');
    }
}
