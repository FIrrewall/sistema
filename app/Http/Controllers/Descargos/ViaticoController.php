<?php

namespace App\Http\Controllers\Descargos;

use App\Http\Controllers\Controller;
use App\Models\Viatico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class ViaticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('viaticos_index'),403);
        $datosGasto['viaticos'] = Viatico::all();
        //$suma = $datosGasto['almuerzo'];
        //return $suma;
        return view('viatico.index',$datosGasto,compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('viaticos_create'),403);
        return view('viatico.create'); 
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
            'detalle'=>'required|string|max:1000',
            'codigo'=>'required|string|max:1000',
            'alojamiento'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'desayuno'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'almuerzo'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'cena'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'gastosVarios'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'detalleGastosVarios'=>'required|string|max:1000',
            'transporte'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosCaja = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        Viatico::insert($datosCaja);
        $post = request()->input('descargo_id');
        return redirect('/registroViaticos/'.$post)->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function show(Viatico $viatico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('viaticos_edit'),403);
        $viatico=Viatico::findOrFail($id);
        return view('viatico.edit', compact('viatico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAlarma = request()->except(['_token','_method','informe_id']);
        Viatico::where('id', '=' , $id)->update($datosAlarma);
        $post = request()->input('descargo_id');
        return redirect('/registroViaticos/'.$post)->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('viaticos_destroy'),403);
        $caja = Viatico::findOrFail($id);
        $idIn = $caja->descargo_id;
        Viatico::destroy($id);
        return redirect('/registroViaticos/'.$idIn)->with('mensaje','Equipo Eliminado');
    }
}
