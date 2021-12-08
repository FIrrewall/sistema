<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\InventarioCctv;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class InventarioCctvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('inventarioCctv_index'),403);
        $datosCctv['inCctvs'] = InventarioCctv::all();
        return view('inCctv.index',$datosCctv,compact('id'));

        /*
        //$users = In::all();
        $datos['inCctvs']=InventarioCctv::all();
        $informes = Informe::latest('id')->first();
        //return $informes;
        return view('inCctv.index',$datos,compact('informes'));
        //,$informes
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('inventarioCctv_create'),403);
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
        //return $request->all();
        $post = request()->input('informe_id');
        return redirect('/cctvInventario/'.$post)->with('mensaje','Equipo agregado con exito');
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
        abort_if(Gate::denies('inventarioCctv_edit'),403);
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
        $post = request()->input('informe_id');
        return redirect('/cctvInventario/'.$post)->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarioCctv  $inventarioCctv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('inventarioCctv_destroy'),403);       
        $entrada = InventarioCctv::findOrFail($id);
        $idIn = $entrada->informe_id;
        InventarioCctv::destroy($id);
        return redirect('/cctvInventario/'.$idIn)->with('mensaje','Equipo Eliminado');
    }
}
