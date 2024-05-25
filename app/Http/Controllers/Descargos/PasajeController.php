<?php

namespace App\Http\Controllers\Descargos;

use App\Http\Controllers\Controller;
use App\Models\Pasaje;
use App\Models\Descargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use PDF;
class PasajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('pasajes_index'),403);
        $datosPasaje['pasajes'] = Pasaje::all();
        return view('pasaje.index',$datosPasaje,compact('id'));
    }

    public function pdf($id)
    {
        abort_if(Gate::denies('pasajes_pdf'),403);
        $pasajes = Pasaje::all();
        $descargos = Descargo::all();
        
        $total = DB::select('SELECT ROUND(SUM(monto), 2) AS total
        FROM pasajes AS PA
        WHERE PA.descargo_id = '.$id.'');
        $pdf = PDF::loadView('pasaje.pdf', ['pasajes' => $pasajes, 'resId' => $id, 'descargos' => $descargos,'total' => $total]);
        $pdf->setPaper('carta', 'landscape');
        //$pdf->render();
        //return $pruebas;
        return $pdf->stream();
        //return view('informe.pdf',compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort_if(Gate::denies('pasajes_create'),403);
        $codigo = Pasaje::latest('id')->first();
        if($codigo != null)
        {
            $codigoPasaje = $codigo->id + 1;    
        }else
        {
            $codigoPasaje = 1;  
        }
        return view('pasaje.create',compact('id','codigoPasaje')); 
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
            'fecha'=>'required|date_format:Y-m-d',
            'detalle'=>'required|string|max:100',
            'codigo'=>'required|string|max:100',
            'transporte'=>'required|string|max:100',
            'origen'=>'required|string|max:100',
            'destino'=>'required|string|max:100',
            'cliente'=>'required|string|max:100',
            'proyecto'=>'required|string|max:100',
            'monto'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
        ];
        $mensaje =[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosCaja = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        Pasaje::insert($datosCaja);
        $post = request()->input('descargo_id');
        return redirect('/registroPasajes/'.$post)->with('nuevo','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function show(Pasaje $pasaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('pasajes_edit'),403);
        $pasaje=Pasaje::findOrFail($id);
        return view('pasaje.edit', compact('pasaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAlarma = request()->except(['_token','_method','informe_id']);
        Pasaje::where('id', '=' , $id)->update($datosAlarma);
        $post = request()->input('descargo_id');
        return redirect('/registroPasajes/'.$post)->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('pasajes_destroy'),403);
        $caja = Pasaje::findOrFail($id);
        $idIn = $caja->descargo_id;
        Pasaje::destroy($id);
        return redirect('/registroPasajes/'.$idIn)->with('eliminar','ok');
    }
}
