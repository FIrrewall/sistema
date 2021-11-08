<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Numero;
use App\Models\Informe;
use Illuminate\Http\Request;

class NumeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = In::all();
        $datos['contactos']=Numero::all();
        $informes = Informe::latest('id')->first();
        //return $informes;
        return view('numero.index',$datos,compact('informes'));
        //,$informes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('numero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'telefono'=>'required|integer|max:100'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        $datosNumero= request()->except('_token'); 
        Numero::insert($datosNumero);
        
        return redirect('numeros')->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function show(Numero $numero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto  = Numero::findOrFail($id);
        return view('numero.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosNumero = request()->except(['_token','_method','informe_id']);
        Numero::where('id', '=' , $id)->update($datosNumero);
        return redirect('numeros')->with('mensaje','Datos de Equipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inCctv = Numero::findOrFail($id);
        Numero::destroy($id); 
        return redirect('numeros')->with('mensaje','Equipo Eliminado');
    }
}
