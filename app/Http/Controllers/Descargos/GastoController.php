<?php

namespace App\Http\Controllers\Descargos;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('gastos_index'),403);
        $datosGasto['gastos'] = Gasto::all();
        return view('gasto.index',$datosGasto,compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('gastos_create'),403);
        return view('gasto.create'); 
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
            'fecha'=>'required|date_format:Y-m-d',
            'detalle'=>'required|string|max:100',
            'codigo'=>'required|string|max:100',
            'proveedor'=>'required|string|max:100',
            'cliente'=>'required|string|max:100',
            'proyecto'=>'required|string|max:100',
            'tipoComprobante'=>'required|string|max:100',
            'numeroComprobante'=>'required|integer|max:1000000',
            'monto'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosCaja = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        Gasto::insert($datosCaja);
        $post = request()->input('descargo_id');
        return redirect('/registroGastos/'.$post)->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('gastos_edit'),403);
        $gasto = Gasto::findOrFail($id);
        return view('gasto.edit', compact('gasto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosGasto = request()->except(['_token','_method','descargo_id']);
        Gasto::where('id', '=' , $id)->update($datosGasto);
        $post = request()->input('descargo_id');
        return redirect('/registroGastos/'.$post)->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('gastos_destroy'),403);
        $registroGasto = Gasto::findOrFail($id);
        $idIn = $registroGasto->descargo_id;
        Gasto::destroy($id);
        return redirect('/registroGastos/'.$idIn)->with('mensaje','Equipo Eliminado');
    }
}
