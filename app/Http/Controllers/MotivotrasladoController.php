<?php

namespace App\Http\Controllers;

use App\Models\motivotraslado;
use Illuminate\Http\Request;

class MotivotrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datos['motivotraslados']=Motivotraslado::paginate(5);

        return view('motivotraslado.index',$datos);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motivotraslado.create');
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
            'motivo' => 'required|string|max:30'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Motivotraslado::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('motivotraslado')->with('Mensaje','Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function show(motivotraslado $idmotivotraslado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($idmotivotraslado)
    {
        $admin= Motivotraslado::findOrFail($idmotivotraslado);

        return view('motivotraslado.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idmotivotraslado)
    {
        $campos = [
            'nombre' => 'required|string|max:30'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Motivotraslado::where('idmotivotraslado','=',$idmotivotraslado)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('motivotraslado')->with('Mensaje','modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function destroy($idmotivotraslado)
    {
        $admin=motivotraslado::findOrFail($idmotivotraslado);
        motivotraslado::destroy($idmotivotraslado);  
        return redirect('motivotraslado')->with('Mensaje','El Motivo fue eliminado');
    }
}
