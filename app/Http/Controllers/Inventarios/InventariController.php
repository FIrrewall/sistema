<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Inventari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InventariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('inventaris_index'),403);
        $datos['inventarios']=Inventari::all();
        return view('inventario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('inventaris_create'),403);
        return view('inventario.create');
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
            'descripcion'=>'required|string|max:1000',
            'fecha'=>'required|date_format:Y-m-d'
        ];
        $mensaje =[
            'required'=>':attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosInventario = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        Inventari::insert($datosInventario);
        return redirect('inventarios')->with('nuevo','ok');
        //return view('hdds/{$informes->id}')->with('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventari  $inventari
     * @return \Illuminate\Http\Response
     */
    public function show(Inventari $inventari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventari  $inventari
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('inventaris_edit'),403);

        $inventario=Inventari::findOrFail($id);

        return view('inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventari  $inventari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosInventario = request()->except(['_token','_method']);
        
        
        Inventari::where('id', '=' , $id)->update($datosInventario);

        return redirect('inventarios')->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventari  $inventari
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('inventaris_destroy'),403);

        Inventari::destroy($id);
        
        return redirect('inventarios')->with('eliminar','ok');
    }
}
