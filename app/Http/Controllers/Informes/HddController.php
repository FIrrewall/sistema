<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Hdd;
use App\Models\Informe;
use App\Models\InventarioCctv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
class HddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('hdds_index'),403);
        $datosHdd['hdds'] = Hdd::all();
        return view('hdd.index',$datosHdd,compact('id'));
        /*
        //$users = In::all();
        $datos['hdds']=Hdd::all();
        //$datosInCctv['inCctvs']=InventarioCctv::all();
        $informes ['informes'] = Informe::latest('id')->first();
        //return $informes;
        return view('hdd.index',$datos,$informes);
        //$datos,$informes,$datosInCctv
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('hdds_create'),403);
        //$informes = Informe::latest('id')->first();
        return view('hdd.create');
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
            'numeroSerie'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'cantidad'=>'required|integer|max:100',
            'capacidad'=>'required|string|max:100'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosHdd = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        Hdd::insert($datosHdd);
        
        //return redirect('hdds')->with('mensaje','Empleado agregado con exito');
        $post = request()->input('informe_id');
        return redirect('/datosInforme/'.$post)->with('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function show(Hdd $hdd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_index'),403);
        $hdd=Hdd::findOrFail($id);

        return view('hdd.edit', compact('hdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = request()->except(['_token','_method','informe_id']);
        
        
        Hdd::where('id', '=' , $id)->update($datosEmpleado);
        $post = request()->input('informe_id');
        return redirect('/datosInforme/'.$post)->with('mensaje','Disco duro modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hdd  $hdd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('hdds_destroy'),403);
        $hdd = Hdd::findOrFail($id);
        $idIn = $hdd->informe_id;
        Hdd::destroy($id);
        return redirect('/datosInforme/'.$idIn)->with('mensaje','Disco duro borrado');
    }
}
