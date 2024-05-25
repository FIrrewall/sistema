<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\UsuariosAlarma;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class UsuariosAlarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('usuariosAlarma_index'),403);   
        $datosUsuarios['usuarios'] = UsuariosAlarma::all();
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
        return view('usuarioAlarma.index',$datosUsuarios,compact('id','resul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort_if(Gate::denies('usuariosAlarma_create'),403);
        $informe = Informe::all();
        foreach ($informe as $info) {
            if ($id == $info->id) {
                if ($info->nombreAgencia == "") {
                    $resul = $info->tipoInforme . " " . $info->nombreAtm;
                } else {
                    $resul = $info->tipoInforme . " " . $info->nombreAgencia;
                }
            }
        }
        return view('usuarioAlarma.create', compact('id','resul'));  
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
        $post = request()->input('informe_id');
        return redirect('/alarmaUsuarios/'.$post)->with('nuevo','ok');
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
        abort_if(Gate::denies('usuariosAlarma_edit'),403);
        $usuario=UsuariosAlarma::findOrFail($id);
        $informe = Informe::all();
        foreach ($informe as $info) {
            if ($usuario->informe_id == $info->id) {
                if ($info->nombreAgencia == "") {
                    $resul = $info->tipoInforme . " " . $info->nombreAtm;
                } else {
                    $resul = $info->tipoInforme . " " . $info->nombreAgencia;
                }
            }
        }
        return view('usuarioAlarma.edit', compact('usuario','resul'));
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
        $post = request()->input('informe_id');
        return redirect('/alarmaUsuarios/'.$post)->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsuariosAlarma  $usuariosAlarma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('usuariosAlarma_destroy'),403);
        $datosUsuarios = UsuariosAlarma::findOrFail($id);
        $idIn = $datosUsuarios->informe_id;
        UsuariosAlarma::destroy($id);
        return redirect('/alarmaUsuarios/'.$idIn)->with('eliminar','ok');

    }
}
