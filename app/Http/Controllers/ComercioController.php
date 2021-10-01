<?php

namespace App\Http\Controllers;

use App\Models\comercio;
use App\Models\proveedor;
use Illuminate\Http\Request;

class ComercioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comercio = Comercio::with('proveedor')->withCount('bovinos')
            ->where( function($query) use($request){
                if ($request->ftipo_comercio) {
                    return $query->where('tipo_comercio',$request->ftipo_comercio);
                } else {
                    return $query;
                }
            })
            ->paginate(5);

        $total = $comercio->sum('bovinos_count');

        $selected_id = [];
        $selected_id['ftipo_comercio'] = $request->ftipo_comercio;

        return view('comercio.index', compact('comercio', 'selected_id', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('comercio.create', compact('proveedores'));
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
            'tipo_comercio' => 'required|string|max:10',
            'id_proveedores' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Comercio::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('comercio')->with('Mensaje','Comercio Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function show($id_comercio)
    {
        $admin = Comercio::with('proveedor', 'bovinos')->findOrFail($id_comercio);

        return view('comercio.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function edit($id_comercio)
    {
        $admin= Comercio::with('proveedor')->findOrFail($id_comercio);
        $proveedores = Proveedor::all();

        return view('comercio.edit',compact('admin', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_comercio)
    {
        $campos = [
            'tipo_comercio' => 'required|string|max:10',
            'id_proveedores' => 'required'
        ];

        $mensaje = ["required"=>'El campo :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Comercio::where('id_comercio','=',$id_comercio)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('comercio')->with('Mensaje','Comercio modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comercio  $comercio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_comercio)
    {
        $admin=comercio::findOrFail($id_comercio);
        comercio::destroy($id_comercio);
        return redirect('comercio')->with('Mensaje','Comercio eliminado');
    }
}
