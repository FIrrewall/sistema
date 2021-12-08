<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('salidas_index'),403);

        $datos['salidas']=Salida::all();
        return view('salida.index',$datos,compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('salidas_create'),403);
        return view('salida.create');
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
            'nombreProyecto'=>'required|string|max:1000',
            'numeroNota'=>'required|integer|max:1000',
            'fecha'=>'required|date_format:Y-m-d',
            'codigo'=>'required|string|max:1000',
            'descripcion'=>'required|string|max:1000',
            'numeroSerie'=>'required|string|max:1000',
            'cantidad'=>'required|integer|max:10000'
        ];
        $mensaje =[
            'required'=>':attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosSalida = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        Salida::insert($datosSalida);
        $post = request()->input('inventari_id');
        return redirect('/salidaInventario/'.$post)->with('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('salidas_edit'),403);
        $salida=Salida::findOrFail($id);

        return view('salida.edit', compact('salida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosSalida = request()->except(['_token','_method']);
        
        
        Salida::where('id', '=' , $id)->update($datosSalida);

        $post = request()->input('inventari_id');
        return redirect('/salidaInventario/'.$post)->with('mensaje');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('salidas_destroy'),403);
        //$id = request()->except('_token');
        $salida = Salida::findOrFail($id);
        $idIn = $salida->inventari_id;
        Salida::destroy($id);
        return redirect('/salidaInventario/'.$idIn)->with('mensaje');
    }

}
