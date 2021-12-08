<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('entradas_index'),403);
        $datos['entradas']=Entrada::all();
        return view('entrada.index',$datos,compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('entradas_create'),403);
        return view('entrada.create');
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
            'numeroFactura'=>'required|integer|max:100000000',
            'numeroNota'=>'required|integer|max:1000000',
            'fecha'=>'required|date_format:Y-m-d',
            'codigo'=>'required|string|max:1000',
            'descripcion'=>'required|string|max:1000',
            'numeroSerie'=>'required|string|max:1000',
            'cantidad'=>'required|integer|max:1000',
        ];
        $mensaje =[
            'required'=>':attribute es requerido'
        ]; 
        $this->validate($request,$campos,$mensaje);      
        $datosEntrada = request()->except('_token');
        
        Entrada::insert($datosEntrada);
        $post = request()->input('inventari_id');
        return redirect('/entradaInventario/'.$post)->with('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('entradas_edit'),403);
        $entrada=Entrada::findOrFail($id);

        return view('entrada.edit', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEntrada = request()->except(['_token','_method']);
        
        
        Entrada::where('id', '=' , $id)->update($datosEntrada);

        $post = request()->input('inventari_id');
        return redirect('/entradaInventario/'.$post)->with('mensaje');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('entradas_destroy'),403);
        $entrada = Entrada::findOrFail($id);
        $idIn = $entrada->inventari_id;
        Entrada::destroy($id);
        return redirect('/entradaInventario/'.$idIn)->with('mensaje');
    }
}
