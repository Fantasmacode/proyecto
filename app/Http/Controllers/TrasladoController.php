<?php

namespace App\Http\Controllers;

use App\Models\traslado;
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
      $datos['traslados']=Traslado::paginate(10);

        return view('traslado.index',$datos);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('traslado.create');
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
            'bovino' => 'required|string|max:30',
            'motivo' => 'required|regex:/^[\pL\s\-]+$/u|max:30'

            
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

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
    public function show(traslado $idtraslado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($idtraslado)
    {
        $admin= Traslado::findOrFail($idtraslado);

        return view('traslado.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idtraslado)
    {
        $campos = [

           'bovino' => 'required|string|max:30',
           'motivo' => 'required|regex:/^[\pL\s\-]+$/u|max:30'

      
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Traslado::where('idtraslado','=',$idtraslado)->update($datoAdmin);

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
    public function destroy($idtraslado)
    {
        $admin=traslado::findOrFail($idtraslado);
        traslado::destroy($idtraslado);  
        return redirect('traslado')->with('Mensaje','Bovino eliminado');
    }
}
 




