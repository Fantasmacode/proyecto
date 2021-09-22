<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios']=Usuarios::paginate(5);
  
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'nom_res' => 'required|max:30',
            'ape_res' => 'required|max:30',
            'tip_doc' => 'required|max:30',
            'num_res' => 'required|max:20',
            'tel_res' => 'required|max:20',
            'cor_res' => 'required|max:40',
            'nom_rol' => 'required|max:20'
        ];
        $Mensaje=["required"=>'La :attribute es requerida'];

        $this->validate($request,$campos,$Mensaje);

        //$datosImages=request()->all();

        $datosImages=request()->except('_token');

        Usuarios::insert($datosImages);

        return redirect('usuarios')->with('Mensaje','Usuario agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $updateimage=Usuarios::findOrFail($id);
        return view('usuarios.edit',compact('updateimage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
           'nom_res' => 'required|max:30',
            'ape_res' => 'required|max:30',
            'tip_doc' => 'required|max:30',
            'num_res' => 'required|max:20',
            'tel_res' => 'required|max:20',
            'cor_res' => 'required|max:40',
            'nom_rol' => 'required|max:20'
        ];
        $Mensaje=["required"=>'La :attribute es requerida'];

        $this->validate($request,$campos,$Mensaje);

        $Mensaje=["required"=>'La :attribute es requerida'];

        $this->validate($request,$campos,$Mensaje);

        $datosImages=request()->except(['_token','_method']);


        Usuarios::where('id','=',$id)->update($datosImages);

        //$updateimage=Updateimages::findOrFail($id);
        //return view('updateimages.edit',compact('updateimage'));

        return redirect('usuarios')->with('Mensaje','Usuario modificado con éxito.');
        //return response()->json($datosImages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $updateimage=Usuarios::findOrFail($id);

        Usuarios::destroy($id);
        //return response()->json($datosImages);
        return redirect('usuarios')->with('Mensaje','Usuario eliminado con éxito.');
    }
}
