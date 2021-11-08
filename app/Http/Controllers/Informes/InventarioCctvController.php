<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\InventarioCctv;
use App\Models\Informe;
use Illuminate\Http\Request;

class InventarioCctvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = In::all();
        $datos['inCctvs']=InventarioCctv::all();
        $informes = Informe::latest('id')->first();
        //return $informes;
        return view('inCctv.index',$datos,compact('informes'));
        //,$informes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inCctv.create');
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
            'nombreEquipo'=>'required|string|max:100',
            'cantidad'=>'required|integer|max:100'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request,$campos,$mensaje);      
        //$datosEmpleado = request()->all();
        $datosCctv = request()->except('_token');
        //Empleado::insert($datosEmpleado);    
        InventarioCctv::insert($datosCctv);
        
        return redirect('inventarioCctvs')->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventarioCctv  $inventarioCctv
     * @return \Illuminate\Http\Response
     */
    public function show(InventarioCctv $inventarioCctv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarioCctv  $inventarioCctv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inCctv=InventarioCctv::findOrFail($id);
        return view('inCctv.edit', compact('inCctv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventarioCctv  $inventarioCctv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosInCctv = request()->except(['_token','_method','informe_id']);
        InventarioCctv::where('id', '=' , $id)->update($datosInCctv);
        return redirect('inventarioCctvs')->with('mensaje','Datos de Equipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarioCctv  $inventarioCctv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inCctv = InventarioCctv::findOrFail($id);
        InventarioCctv::destroy($id); 
        return redirect('inventarioCctvs')->with('mensaje','Equipo Eliminado');
    }
}
