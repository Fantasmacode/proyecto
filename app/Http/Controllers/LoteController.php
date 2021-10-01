<?php

namespace App\Http\Controllers;

use App\Models\lote;
use App\Models\estadolote;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['lotes']=Lote::with('estado')->paginate(10);

        return view('lote.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = estadolote::all();
        return view('lote.create', compact('estados'));
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
            'area_lote' => 'required|string|max:9',
            'extension_lote' => 'required|string|max:9',
            'nombre_lote' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            //'fecha_lote' => 'required',
            //'fcierre_lote' => 'required',
            'id_estadol' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $request->request->add(['fecha_lote' => Carbon::now()->format('Y-m-d')]);

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Lote::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('lote')->with('Mensaje','Lote Agregado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function show(lote $idlote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function edit($id_lote)
    {
        $admin= Lote::with('estado')->findOrFail($id_lote);
        $estados = estadolote::all();
        return view('lote.edit',compact('admin', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_lote)
    {
        $campos = [
            'area_lote' => 'required|string|max:9',
            'extension_lote' => 'required|string|max:9',
            'nombre_lote' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            //'fecha_lote' => 'required',
            //'fcierre_lote' => 'required',
            'id_estadol' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Lote::where('id_lote','=',$id_lote)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('lote')->with('Mensaje','Lote modificado con Éxito');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_lote)
    {
        $admin=lote::findOrFail($id_lote);
        lote::destroy($id_lote);
        return redirect('lote')->with('Mensaje','Lote eliminado');
    }
}
