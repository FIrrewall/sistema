<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Hdd;
use App\Models\Informe;
use App\Models\InventarioCctv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = In::all();
        $datos['hdds']=Hdd::all();
        //$datosInCctv['inCctvs']=InventarioCctv::all();
        $informes ['informes'] = Informe::latest('id')->first();
        //return $informes;
        return view('hdd.index',$datos,$informes);
        //$datos,$informes,$datosInCctv
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$informes = Informe::latest('id')->first();
        return view('hdd.create');
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
            'numeroSerie'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'cantidad'=>'required|integer|max:100',
            'capacidad'=>'required|string|max:100'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosHdd = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        Hdd::insert($datosHdd);
        
        return redirect('hdds')->with('mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function show(Hdd $hdd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hdd=Hdd::findOrFail($id);

        return view('hdd.edit', compact('hdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = request()->except(['_token','_method','informe_id']);
        
        
        Hdd::where('id', '=' , $id)->update($datosEmpleado);

        return redirect('hdds')->with('mensaje','Informe modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hdd = Hdd::findOrFail($id);
        
        Hdd::destroy($id);
        
        return redirect('hdds')->with('mensaje','Empleado borrado');
    }
}
