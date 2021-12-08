<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\TrabajosRealizado;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
class TrabajosRealizadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('trabajosRealizados_index'),403);
        $datosTrabajo['trabajos'] = TrabajosRealizado::all();
        return view('trabajo.index',$datosTrabajo,compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('trabajosRealizados_create'),403);
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
            'descripcion'=>'required|string|max:100',
            'imagen' => 'required|image|max:2048'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request,$campos,$mensaje);      
        //$datosEmpleado = request()->all();
        $datosTrabajo = request()->except('_token');
        //Empleado::insert($datosEmpleado); 
        if($request-> hasFile('imagen')){
            
            $file = $request->file('imagen');
            $nombre = date("Y-m-d",time())."_".$file->getClientOriginalName();
            //$datosTrabajo['imagen']=$request->file('imagen')->store('uploads','public');
            $datosTrabajo['imagen']=$file->storeAs('trabajos',$nombre,'public');
        }   
        TrabajosRealizado::insert($datosTrabajo);
        //return $datosTrabajo['imagen'];
        $post = request()->input('informe_id');
        return redirect('/trabajos/'.$post)->with('mensaje','Equipo agregado con exito');
    }
//return redirect('numeros')->with('mensaje','Equipo agregado con exito');
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
        abort_if(Gate::denies('trabajosRealizados_edit'),403);
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
            $file = $request->file('imagen');
            $nombre = date("Y-m-d",time())."_".$file->getClientOriginalName();
            //$datosTrabajo['imagen']=$request->file('imagen')->store('uploads','public');
            $datosTrabajo['imagen']=$file->storeAs('trabajos',$nombre,'public');
            //$datosTrabajo['imagen'] = $request->file('imagen')->store('trabajos','public');
        }
        
        TrabajosRealizado::where('id', '=' , $id)->update($datosTrabajo);
        $post = request()->input('informe_id');
        return redirect('/trabajos/'.$post)->with('mensaje','Equipo agregado con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrabajosRealizado  $trabajosRealizado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('trabajosRealizados_destroy'),403);

        $datosTrabajo = TrabajosRealizado::findOrFail($id);
        $idIn = $datosTrabajo->informe_id;
        TrabajosRealizado::destroy($id);
        return redirect('/trabajos/'.$idIn)->with('mensaje','Equipo Eliminado');

    }
}
