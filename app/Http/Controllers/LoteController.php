<?php

namespace App\Http\Controllers;

use App\Models\lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['lotes']=Lote::paginate(10);

        return view('lote.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lote.create');
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
            'area' => 'required|string|max:15',
            'extension' => 'required|string|max:20',
            'nombrelote' => 'required|regex:/^[\pL\s\-]+$/u',
            'estado' => 'required|string|max:20'

            
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Lote::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('lote')->with('Mensaje','Lote Agregado con Exito');
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
    public function edit($idlote)
    {
        $admin= Lote::findOrFail($idlote);

        return view('lote.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idlote)
    {
        $campos = [
            'area' => 'required|string|max:15',
            'extension' => 'required|string|max:20',
            'nombrelote' => 'required|regex:/^[\pL\s\-]+$/u',
            'estado' => 'required|string|max:20'

        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Lote::where('idlote','=',$idlote)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('lote')->with('Mensaje','Lote modificado con exito');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function destroy($idlote)
    {
        $admin=lote::findOrFail($idlote);
        lote::destroy($idlote);  
        return redirect('lote')->with('Mensaje','Lote eliminado');
    }
}
