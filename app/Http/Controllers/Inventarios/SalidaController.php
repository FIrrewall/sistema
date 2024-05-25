<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Salida;
use App\Models\Producto;
use App\Models\Inventari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

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
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        return view('salida.index',$datos,compact('id','resul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort_if(Gate::denies('salidas_create'),403);
        $producto['productos']= Producto::all();
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        return view('salida.create',$producto,compact('id','resul'));
    }

    public function pdf($id)
    {
        abort_if(Gate::denies('salidas_pdf'),403);
        $salidas = Salida::all();
        $inventarios = Inventari::all();
        $pdf = PDF::loadView('salida.pdf', ['salidas' => $salidas, 'resId' => $id, 'inventarios' => $inventarios]);
        $pdf->setPaper('carta', 'landscape');
        //$pdf->render();
        //return $pruebas;
        return $pdf->stream();
        //return view('informe.pdf',compact('informes'));
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
            'nombreProyecto'=>'required|string|max:100000000',
            'numeroNotaSal'=>'required|integer|max:100000000',
            'fecha'=>'required|date_format:Y-m-d',
            'codigoSal'=>'required|string|max:1000',
            'descripcionSal'=>'required|string|max:1000',
            'cantidadSal'=>'required|integer|max:10000'
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
        return redirect('/salidaInventario/'.$post)->with('nuevo','ok');
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
        $producto['productos']= Producto::all();
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($salida->inventari_id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        return view('salida.edit',$producto,compact('salida','resul'));
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
        return redirect('/salidaInventario/'.$post)->with('actualizar','ok');
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
        return redirect('/salidaInventario/'.$idIn)->with('eliminar','ok');
    }

}
