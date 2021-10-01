<?php

namespace App\Http\Controllers;

use App\Models\baja;
use App\Models\bovino;
use Illuminate\Http\Request;

class BajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['bajas']=Baja::with('bovino.raza')->paginate(5);

        return view('baja.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bovinos = bovino::whereDoesntHave('baja')->with('raza')->get();
        return view('baja.create', compact('bovinos'));
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
            'motivo_baja' => 'required|regex:/^[\pL\s\-]+$/u|max:20',
            'fecha_baja' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Baja::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('baja')->with('Mensaje','Baja Agregada con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function show(baja $id_baja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function edit($id_baja)
    {
        $admin = Baja::findOrFail($id_baja);
        $bovinos = bovino::all();

        return view('baja.edit',compact('admin', 'bovinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_baja)
    {
        $campos = [
            'id_bovino' => 'required',
            'motivo_baja' => 'required|regex:/^[\pL\s\-]+$/u|max:20',
            'fecha_baja' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Baja::where('id_baja','=',$id_baja)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('baja')->with('Mensaje','Baja modificada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_baja)
    {
        $admin=baja::findOrFail($id_baja);
        baja::destroy($id_baja);
        return redirect('baja')->with('Mensaje','baja eliminada');
    }
}
