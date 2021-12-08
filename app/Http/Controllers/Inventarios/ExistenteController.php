<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Existente;
use App\Models\Inventari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

class ExistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        abort_if(Gate::denies('existentes_index'),403);
        $datosExistentes['existentes'] = Existente::all();
        return view('existente.index',$datosExistentes,compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('existentes_create'),403);
        return view('existente.create');
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
            'codigoProducto'=>'required|string|max:1000',
            'descripcion'=>'required|string|max:1000',
            'existenciaInicial'=>'required|integer|max:1000'
        ];
        $mensaje =[
            'required'=>':attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        
        $datosExistente = request()->except('_token');

        $id = request()->except(['_token','_method','codigoProducto','descripcion','existenciaInicial','id']);
        Existente::insert($datosExistente);
        $post = request()->input('inventari_id');
        return redirect('/existenteInventario/'.$post)->with('mensaje');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function show(Existente $existente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('existentes_edit'),403);
        $existente=Existente::findOrFail($id);

        return view('existente.edit', compact('existente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosExistente = request()->except(['_token','_method']);
        $post = request()->input('inventari_id');
        
        Existente::where('id', '=' , $id)->update($datosExistente);
        return redirect('/existenteInventario/'.$post)->with('mensaje','Inventario modificado');
        //return redirect('existentes')->with('mensaje','Inventario modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('existentes_destroy'),403);
        $existente = Existente::findOrFail($id);
        $idIn = $existente->inventari_id;
        Existente::destroy($id);
        return redirect('/existenteInventario/'.$idIn)->with('mensaje','Inventario borrado');
    }
}
