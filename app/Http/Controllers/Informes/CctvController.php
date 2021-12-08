<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Cctv;
use App\Models\Informe;
use Illuminate\Http\Request;

class CctvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = In::all();
        $datos['contactos']=Cctv::all();
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
            'nombre'=>'required|string|max:1000',
            'telefono'=>'required|integer|max:100000000'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        $datosNumero = request()->except('_token'); 
        Cctv::insert($datosNumero);
        //return $request->all();
        return redirect('registros')->with('mensaje','Datos guardados correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function show(Cctv $cctv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto  = Cctv::findOrFail($id);
        return view('numero.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosNumero = request()->except(['_token','_method','informe_id']);
        Cctv::where('id', '=' , $id)->update($datosNumero);
        return redirect('registros')->with('mensaje','Datos de Equipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inCctv = Cctv::findOrFail($id);
        Cctv::destroy($id); 
        return redirect('registros')->with('mensaje','Equipo Eliminado');
    }
}
