<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\InventarioAlarma;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class InventarioAlarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('inventarioAlarmas_index'),403);
        $datosAlarma['inAlarmas'] = InventarioAlarma::all();
        $informe = Informe::all();
        foreach($informe as $info)
        {
            if($id == $info->id)
            {
                if($info->nombreAgencia == "")
                {
                    $resul = $info->tipoInforme." ".$info->nombreAtm;
                }else
                {
                    $resul = $info->tipoInforme." ".$info->nombreAgencia;
                }
            }
        }
        return view('inAlarma.index',$datosAlarma,compact('id','resul'));
        /*
        //$users = In::all();
        $datos['inAlarmas']=InventarioAlarma::all();
        $informes = Informe::latest('id')->first();
        //return $informes;
        return view('inAlarma.index',$datos,compact('informes'));
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
        abort_if(Gate::denies('inventarioAlarmas_create'),403);
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
        $post = request()->input('informe_id');
        return redirect('/alarmaInventario/'.$post)->with('nuevo','ok');
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
        abort_if(Gate::denies('inventarioAlarmas_edit'),403);
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
        $post = request()->input('informe_id');
        return redirect('/alarmaInventario/'.$post)->with('actualizar','ok');
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
        abort_if(Gate::denies('inventarioAlarmas_destroy'),403);
        $alarma = InventarioAlarma::findOrFail($id);
        $idIn = $alarma->informe_id;
        InventarioAlarma::destroy($id);
        return redirect('/alarmaInventario/'.$idIn)->with('eliminar','ok');
    }
}
