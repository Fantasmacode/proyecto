<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datos['proveedors']=Proveedor::paginate(5);

        return view('proveedor.index',$datos);  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
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
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|max:20',
            'direccion' => 'required|string|max:10',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|string|max:20'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        //$datoAdmin=request()->all();

        $datoAdmin=request()->except('_token');

        Proveedor::insert($datoAdmin);

        //return response()->json($datoAdmin);
        return redirect('proveedor')->with('Mensaje','Proveedor Agregado con Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function show(proveedor $idproveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function edit($idproveedor)
    {
        $admin= Proveedor::findOrFail($idproveedor);

        return view('proveedor.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idproveedor)
    {
        $campos = [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|max:20',
            'direccion' => 'required|string|max:10',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|string|max:20'
        ];

        $mensaje = ["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);


        $datoAdmin=request()->except(['_token','_method']);

        Proveedor::where('idproveedor','=',$idproveedor)->update($datoAdmin);

        //$admin= administrador::findOrFail($id);
        //return view('administrador.edit',compact('admin'));

        return redirect('proveedor')->with('Mensaje','Proveedor modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bovino  $bovino
     * @return \Illuminate\Http\Response
     */
    public function destroy($idproveedor)
    {
        $admin=proveedor::findOrFail($idproveedor);
        proveedor::destroy($idproveedor);  
        return redirect('proveedor')->with('Mensaje','Proveedor eliminado');
    }
}
