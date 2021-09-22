<?php

namespace App\Http\Controllers;

use App\Models\alerta;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['alertas']=Alerta::paginate(5);

        return view('alerta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alerta.create');
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
            'mensajealerta' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Alerta::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('alerta')->with('Mensaje','Alerta Agregada con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function show(alerta $idalerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function edit($idalerta)
    {
        $admin= Alerta::findOrFail($idalerta);

        return view('alerta.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idalerta)
    {
        $campos = [
            'mensajealerta' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Alerta::where('idalerta','=',$idalerta)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('alerta')->with('Mensaje','Alerta modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function destroy($idalerta)
    {
        $admin=alerta::findOrFail($idalerta);
        alerta::destroy($idalerta);  
        return redirect('alerta')->with('Mensaje','Alerta eliminada');
    }
}
