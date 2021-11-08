<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\TrabajosRealizado;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrabajosRealizadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['trabajos']=TrabajosRealizado::all();
        $informes = Informe::latest('id')->first();
        return view('trabajo.index',$datos,compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajo.create');
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
            'descripcion'=>'required|string|max:100'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request,$campos,$mensaje);      
        //$datosEmpleado = request()->all();
        $datosTrabajo = request()->except('_token');
        //Empleado::insert($datosEmpleado); 
        if($request-> hasFile('imagen')){
            
            $datosTrabajo['imagen']=$request->file('imagen')->store('uploads','public');
            
        }   
        TrabajosRealizado::insert($datosTrabajo);
        
        return redirect('trabajosRealizados')->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrabajosRealizado  $trabajosRealizado
     * @return \Illuminate\Http\Response
     */
    public function show(TrabajosRealizado $trabajosRealizado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrabajosRealizado  $trabajosRealizado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajo = TrabajosRealizado::findOrFail($id);
        return view('trabajo.edit', compact('trabajo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrabajosRealizado  $trabajosRealizado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $trabajo = TrabajosRealizado::findOrFail($id);
        $datosTrabajo = request()->except(['_token','_method','informe_id']);
        
        if($request-> hasFile('imagen')){
            Storage::delete('public/'.$trabajo->imagen);

            $datosTrabajo['imagen'] = $request->file('imagen')->store('uploads','public');
        }
        
        TrabajosRealizado::where('id', '=' , $id)->update($datosTrabajo);

        // $empleado = Empleado::findOrFail($id);
        // return view('empleado.index', compact('empleado'));
        //$empleado = TrabajosRealizado::findOrFail($id);
        // $datos['empleados']=Empleado::paginate(5);
        // return view('empleado.', compact('datos'));
        return redirect('trabajosRealizados')->with('mensaje','Datos de Equipo Modificado');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrabajosRealizado  $trabajosRealizado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$inCctv = InventarioCctv::findOrFail($id);
        TrabajosRealizado::destroy($id); 
        return redirect('trabajosRealizados')->with('mensaje','Equipo Eliminado');
    }
}
