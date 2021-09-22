<?php

namespace App\Http\Controllers;

use App\Models\retorno;
use Illuminate\Http\Request;

class RetornoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['retornos']=Retorno::paginate(10);

        return view('retorno.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retorno.create');
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
            'nombrebovino' => 'required|string|max:20',
            
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Retorno::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('retorno')->with('Mensaje','Agregado con Exito');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\retorno  $retorno
     * @return \Illuminate\Http\Response
     */
    public function show(retorno $idretorno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\retorno  $retorno
     * @return \Illuminate\Http\Response
     */
    public function edit($idretorno)
    {
        $admin= Retorno::findOrFail($idretorno);

        return view('retorno.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\retorno  $retorno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idretorno)
    {
        $campos = [
           'nombrebovino' => 'required|string|max:20',
      
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Retorno::where('idretorno','=',$idretorno)->update($datoAdmin);

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
    public function destroy($idretorno)
    {
        $admin=traslado::findOrFail($idretorno);
        traslado::destroy($idretorno);  
        return redirect('retorno')->with('Mensaje','eliminado');
    }
}
