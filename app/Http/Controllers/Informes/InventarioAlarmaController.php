<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\InventarioAlarma;
use App\Models\Informe;
use Illuminate\Http\Request;

class InventarioAlarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = In::all();
        $datos['inAlarmas']=InventarioAlarma::all();
        $informes = Informe::latest('id')->first();
        //return $informes;
        return view('inAlarma.index',$datos,compact('informes'));
        //,$informes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inAlarma.create');    
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
        $datosAlarma = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        InventarioAlarma::insert($datosAlarma);
        
        return redirect('inventarioAlarmas')->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventarioAlarma  $inventarioAlarma
     * @return \Illuminate\Http\Response
     */
    public function show(InventarioAlarma $inventarioAlarma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarioAlarma  $inventarioAlarma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inAlarma=InventarioAlarma::findOrFail($id);
        return view('inAlarma.edit', compact('inAlarma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventarioAlarma  $inventarioAlarma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosAlarma = request()->except(['_token','_method','informe_id']);
        InventarioAlarma::where('id', '=' , $id)->update($datosAlarma);
        return redirect('inventarioAlarmas')->with('mensaje','Datos de Equipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarioAlarma  $inventarioAlarma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$inCctv = InventarioAlarma::findOrFail($id);
        InventarioAlarma::destroy($id); 
        return redirect('inventarioAlarmas')->with('mensaje','Equipo Eliminado');
    }
}
