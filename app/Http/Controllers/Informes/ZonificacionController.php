<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Zonificacion;
use App\Models\Informe;
use Illuminate\Http\Request;

class ZonificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$users = In::all();
       $datos['zonas']=Zonificacion::all();
       $informes = Informe::latest('id')->first();
       //return $informes;
       return view('zonificacion.index',$datos,compact('informes'));
       //,$informes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zonificacion.create');  
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
            'nombreModulo'=>'required|string|max:100',
            'numeroSerie'=>'required|string|max:100',
            'numeroZona'=>'required|integer|max:100',
            'numeroParticion'=>'required|integer|max:100',
            'nombreParticion'=>'required|string|max:100',
            'nombreSensor'=>'required|string|max:100',
            'descripcion'=>'required|string'            
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosZona = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        Zonificacion::insert($datosZona);
        
        return redirect('zonificaciones')->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zonificacion  $zonificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Zonificacion $zonificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zonificacion  $zonificacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zona=Zonificacion::findOrFail($id);
        return view('zonificacion.edit', compact('zona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zonificacion  $zonificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosZona = request()->except(['_token','_method','informe_id']);
        Zonificacion::where('id', '=' , $id)->update($datosZona);
        return redirect('zonificaciones')->with('mensaje','Datos de Equipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zonificacion  $zonificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Zonificacion::destroy($id); 
        return redirect('zonificaciones')->with('mensaje','Equipo Eliminado');
    }
}
