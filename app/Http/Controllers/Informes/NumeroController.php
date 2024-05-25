<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Numero;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class NumeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('numeros_index'),403);
        $datosNumero['contactos'] = Numero::all();
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
        return view('numero.index',$datosNumero,compact('id','resul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('numeros_create'),403);
        return view('numero.create');
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
            'nombre'=>'required|string|max:1000',
            'telefono'=>'required|integer|max:1000000000'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        $datosNumero= request()->except('_token'); 
        Numero::insert($datosNumero);
        $post = request()->input('informe_id');
        return redirect('/registroNumero/'.$post)->with('nuevo','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function show(Numero $numero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('numeros_edit'),403);
        $contacto  = Numero::findOrFail($id);
        return view('numero.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosNumero = request()->except(['_token','_method','informe_id']);
        Numero::where('id', '=' , $id)->update($datosNumero);
        $post = request()->input('informe_id');
        return redirect('/registroNumero/'.$post)->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Numero  $numero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('numeros_destroy'),403);
        $datosZona = Numero::findOrFail($id);
        $idIn = $datosZona->informe_id;
        Numero::destroy($id);
        return redirect('/registroNumero/'.$idIn)->with('eliminar','ok');
    }
}
