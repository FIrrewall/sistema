<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['informes']=Informe::all();
        return view('informe.index',$datos);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informe.create');
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
            'cliente'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'modeloPanel'=>'required|string|max:100',
            'lineaTelefonica'=>'required|string|max:100',
            'ipModulo'=>'required|string|max:100',
            'observaciones'=>'required|string',
            'recomendaciones'=>'required|string'
        ];
        $mensaje =[
            'required'=>':attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosInforme = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        Informe::insert($datosInforme);
        return redirect('hdds')->with('mensaje');
        //return view('hdds/{$informes->id}')->with('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informe=Informe::findOrFail($id);

        return view('informe.edit', compact('informe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = request()->except(['_token','_method']);
        
        
        Informe::where('id', '=' , $id)->update($datosEmpleado);

        return redirect('informes')->with('mensaje','Informe modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Informe::destroy($id);
        
        return redirect('informes')->with('mensaje','Empleado borrado');
    }


    public function work()
    {
        return view('informe.work');
    }
}
