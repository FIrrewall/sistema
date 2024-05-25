<?php

namespace App\Http\Controllers;

use App\Models\encargado;
use Illuminate\Http\Request;
use App\Models\alojamiento;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('encargados_index'),403);
        $datosEncarga['encarg'] = Encargado::all();
        $datosAloja['aloja'] = Alojamiento::all();
        //$usuario = auth()->user();
        $user = User::all();

        //return dd($usuario);
        //$user = $usuario->name;
        return view('encargado.index',$datosEncarga,$datosAloja)->with(['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('encargados_create'),403);
        return view('encargado.create');
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
            'nombreE'=>'required|string|max:10000',
            'paternoE'=>'required|string|max:10000',
            'maternoE'=>'required|string|max:10000',
            'ciE'=>'required|string|max:100000',
            'celularE'=>'required|integer|max:1000000000',
            'alojamiento_id'=>'required|integer|max:10000'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosEncarga= request()->except('_token');
        //Empleado::insert($datosEmpleado);
        //return dd($datosEncarga);
        Encargado::insert($datosEncarga);
        
        //return redirect('hdds')->with('mensaje','Empleado agregado con exito');
        //$post = request()->input('informe_id');
        return redirect('/encargados')->with('nuevo','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function show(encargado $encargado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function edit(encargado $encargado)
    {
        abort_if(Gate::denies('encargados_edit'),403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEncargado = request()->except(['_token','_method']);
        
        
        Encargado::where('id', '=' , $id)->update($datosEncargado);
        //$post = request()->input('informe_id');
        return redirect('encargados')->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('encargados_destroy'),403);
        Encargado::destroy($id);
        return redirect('encargados')->with('eliminar','ok');
    }
}
