<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\UsuariosAlarma;
use App\Models\Informe;
use Illuminate\Http\Request;

class UsuariosAlarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = In::all();
       $datos['usuarios']=UsuariosAlarma::all();
       $informes = Informe::latest('id')->first();
       //return $informes;
       return view('usuarioAlarma.index',$datos,compact('informes'));
       //,$informes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarioAlarma.create');  
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
            'numeroUsuario'=>'required|integer|max:100',
            'nombreUsuario'=>'required|string|max:100',
            'area'=>'required|string|max:100'         
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosUsuario = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        UsuariosAlarma::insert($datosUsuario);
        
        return redirect('usuariosAlarma')->with('mensaje','Equipo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsuariosAlarma  $usuariosAlarma
     * @return \Illuminate\Http\Response
     */
    public function show(UsuariosAlarma $usuariosAlarma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsuariosAlarma  $usuariosAlarma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=UsuariosAlarma::findOrFail($id);
        return view('usuarioAlarma.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsuariosAlarma  $usuariosAlarma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosZona = request()->except(['_token','_method','informe_id']);
        UsuariosAlarma::where('id', '=' , $id)->update($datosZona);
        return redirect('usuariosAlarma')->with('mensaje','Datos de Equipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsuariosAlarma  $usuariosAlarma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsuariosAlarma::destroy($id); 
        return redirect('usuariosAlarma')->with('mensaje','Equipo Eliminado');
    }
}
