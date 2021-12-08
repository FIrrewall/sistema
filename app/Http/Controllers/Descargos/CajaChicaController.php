<?php

namespace App\Http\Controllers\Descargos;

use App\Http\Controllers\Controller;
use App\Models\CajaChica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class CajaChicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('cajaChica_index'),403);
        $datosCaja['cajas'] = CajaChica::all();
        return view('cajaChica.index',$datosCaja,compact('id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('cajaChica_create'),403);
        return view('cajaChica.create'); 
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
            'clienteProyecto'=>'required|string|max:100',
            'monto'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosCaja = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        CajaChica::insert($datosCaja);
        $post = request()->input('descargo_id');
        return redirect('/cajaChica/'.$post)->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function show(CajaChica $cajaChica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('cajaChica_edit'),403);
        $caja=CajaChica::findOrFail($id);
        return view('inAlarma.edit', compact('caja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAlarma = request()->except(['_token','_method','informe_id']);
        CajaChica::where('id', '=' , $id)->update($datosAlarma);
        $post = request()->input('descargo_id');
        return redirect('/cajaChica/'.$post)->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        abort_if(Gate::denies('cajaChica_destroy'),403);
        $caja = CajaChica::findOrFail($id);
        $idIn = $caja->descargo_id;
        CajaChica::destroy($id);
        return redirect('/cajaChica/'.$idIn)->with('mensaje','Equipo Eliminado');
    }
}
