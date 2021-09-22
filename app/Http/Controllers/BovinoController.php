<?php

namespace App\Http\Controllers;

use App\Models\bovino;
use Illuminate\Http\Request;
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
      $datos['bovinos']=Bovino::paginate(10);

        return view('bovino.index',$datos);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bovino.create');
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
            'peso' => 'required|integer|between:1,1100',
            'usuario' => 'required|string|max:20',
            'estado' => 'required|string|max:10',
            'edad' => 'required|integer|between:1,22',
            'raza' => 'required|string|max:30',
            'finalidad' => 'required|string|max:20',
            'lote' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

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
    public function show(bovino $idbovino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($idbovino)
    {
        $admin= Bovino::findOrFail($idbovino);

        return view('bovino.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idbovino)
    {
        $campos = [
            'peso' => 'required|integer|between:1,1100',
            'usuario' => 'required|string|max:20',
            'estado' => 'required|string|max:10',
            'edad' => 'required|integer|between:1,100',
            'raza' => 'required|string|max:30',
            'finalidad' => 'required|string|max:20',
            'lote' => 'required|string|max:15'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Bovino::where('idbovino','=',$idbovino)->update($datoAdmin);

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
    public function destroy($idbovino)
    {
        $admin=bovino::findOrFail($idbovino);
        bovino::destroy($idbovino);  
        return redirect('bovino')->with('Mensaje','Bovino eliminado');
    }
}
