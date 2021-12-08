<?php

namespace App\Http\Controllers\Descargos;

use App\Http\Controllers\Controller;
use App\Models\Descargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class DescargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('descargos_index'),403);
        $datos['descargos']=Descargo::all();
        return view('descargo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        abort_if(Gate::denies('descargos_create'),403);
        return view('descargo.create');
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
            'departamento'=>'required|string|max:1000',
            'nombreSolicitante'=>'required|string|max:1000',
            'cargo'=>'required|string|max:1000',
            'nombreDestinatario'=>'required|string|max:1000',
            'fecha'=>'required|date_format:Y-m-d',
            'fechaDesde'=>'required|date_format:Y-m-d',
            'fechaHasta'=>'required|date_format:Y-m-d'
        ];
        $mensaje =[
            'required'=>':attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosDescargo = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        Descargo::insert($datosDescargo);
        return redirect('descargos')->with('mensaje');
        //return view('hdds/{$informes->id}')->with('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Descargo  $descargo
     * @return \Illuminate\Http\Response
     */
    public function show(Descargo $descargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Descargo  $descargo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        abort_if(Gate::denies('descargos_edit'),403);
        $descargo=Descargo::findOrFail($id);
        return view('descargo.edit', compact('descargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Descargo  $descargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosDescargo = request()->except(['_token','_method']);
        
        Descargo::where('id', '=' , $id)->update($datosDescargo);

        return redirect('descargos')->with('mensaje','Inventario modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Descargo  $descargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        abort_if(Gate::denies('descargos_destroy'),403);
        Descargo::destroy($id);
        
        return redirect('descargos')->with('mensaje','Inventario borrado');
    }
}
