<?php

namespace App\Http\Controllers;

use App\Models\raza;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['razas']=Raza::paginate(10);

        return view('raza.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('raza.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombreraza' => 'required|regex:/^[\pL\s\-]+$/u'
           
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Raza::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('raza')->with('Mensaje','Raza Agregada con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function show(raza $idraza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function edit($idraza)
    {
        $admin= Raza::findOrFail($idraza);

        return view('raza.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idraza)
    {
        $campos = [
            'nombreraza' => 'required|regex:/^[\pL\s\-]+$/u'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Raza::where('idraza','=',$idraza)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('raza')->with('Mensaje','Raza modificada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\raza  $raza
     * @return \Illuminate\Http\Response
     */
    public function destroy($idraza)
    {
        $admin=raza::findOrFail($idraza);
        raza::destroy($idraza);  
        return redirect('raza')->with('Mensaje','Raza eliminada');
    }
}
