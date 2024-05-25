<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Simbolo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
//use Alert;
class SimboloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('simbolos_index'),403);
        $simbolo['simbolos'] = Simbolo::all();
        //Alert::toast('Producto registrado','success');
        //Alert::success('Success Title', 'Success Message');
        
        return view('simbolo.index',$simbolo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('simbolos_create'),403);
        return view('simbolo.create');
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
            'nombreSimbolo'=>'required|string|max:100',
            'simbolo' => 'required|image|max:2048'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request,$campos,$mensaje);      
        //$datosEmpleado = request()->all();
        $datosSimbolo = request()->except('_token');
        //Empleado::insert($datosEmpleado); 
        if($request-> hasFile('simbolo')){
            
            $file = $request->file('simbolo');
            $nombre = date("Y-m-d",time())."_".$file->getClientOriginalName();
            //$datosTrabajo['imagen']=$request->file('imagen')->store('uploads','public');
            $datosSimbolo['simbolo']=$file->storeAs('simbolos',$nombre,'public');
        }   
        Simbolo::insert($datosSimbolo);
        
        //alert()->success('Title','Lorem Lorem Lorem');
        return redirect('/simbolos')->with('nuevo','ok');
        //with('mensaje','Simbolo agregado con exito');
        //'/simbolos'->route('simbolos')
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simbolo  $simbolo
     * @return \Illuminate\Http\Response
     */
    public function show(Simbolo $simbolo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simbolo  $simbolo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('simbolos_edit'),403);
        $simbolo = Simbolo::findOrFail($id);
        return view('simbolo.edit', compact('simbolo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simbolo  $simbolo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $simbolo = Simbolo::findOrFail($id);
        $datosSimbolo = request()->except(['_token','_method','informe_id']);
        
        if($request-> hasFile('simbolo')){
            Storage::delete('public/'.$simbolo->simbolo);
            $file = $request->file('simbolo');
            $nombreImagen = date("Y-m-d",time())."_".$file->getClientOriginalName();
            //$datosTrabajo['imagen']=$request->file('imagen')->store('uploads','public');
            $datosSimbolo['simbolo']=$file->storeAs('simbolos',$nombreImagen,'public');
            //$datosTrabajo['imagen'] = $request->file('imagen')->store('trabajos','public');
        }
        
        Simbolo::where('id', '=' , $id)->update($datosSimbolo);
        return redirect('/simbolos')->with('actualizar','ok');
        //->withSuccessMessage('Se actualizo correctamente')
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simbolo  $simbolo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('simbolos_destroy'),403);
        //$datosTrabajo = Simbolo::findOrFail($id);
        Simbolo::destroy($id);
        return redirect('/simbolos')->with('eliminar','ok');
    }
}
