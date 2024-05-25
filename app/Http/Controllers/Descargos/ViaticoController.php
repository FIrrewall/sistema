<?php

namespace App\Http\Controllers\Descargos;

use App\Http\Controllers\Controller;
use App\Models\Viatico;
use App\Models\Descargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use PDF;

class ViaticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('viaticos_index'), 403);
        $viaticos = Viatico::all();
        $totals = DB::select('SELECT codigo, (alojamiento + desayuno + almuerzo + cena + gastosVarios + transporte) AS suma
        FROM  viaticos');
        
        //$suma = $datosGasto['almuerzo'];
        //return $suma;
        return view('viatico.index',compact('id'))->with(['viaticos' => $viaticos, 'totals' => $totals]);
    }

    public function pdf($id)
    {
        abort_if(Gate::denies('viaticos_pdf'), 403);
        $viaticos = Viatico::all();
        $descargos = Descargo::all();
        
        $sumas = DB::select('SELECT codigo, ROUND((alojamiento + desayuno + almuerzo + cena + gastosVarios + transporte), 2) AS sumatoria
        FROM  viaticos AS VI
        WHERE (VI.descargo_id =  '.$id.')');

        $totals = DB::select('SELECT SUM(ROUND((alojamiento + desayuno + almuerzo + cena + gastosVarios + transporte), 2)) AS total
        FROM  viaticos AS VI
        WHERE (VI.descargo_id = '.$id.')');

        $pdf = PDF::loadView('viatico.pdf', ['viaticos' => $viaticos, 'resId' => $id, 'descargos' => $descargos,'sumas' => $sumas,'totals' => $totals]);
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
        abort_if(Gate::denies('viaticos_create'), 403);
        $codigo = Viatico::latest('id')->first();
        if($codigo != null)
        {
            $codigoViatico = $codigo->id + 1;    
        }else
        {
            $codigoViatico = 1;  
        }
        return view('viatico.create',compact('id','codigoViatico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'fecha' => 'required|date_format:Y-m-d',
            'detalle' => 'required|string|max:1000',
            'codigo' => 'required|string|max:1000',
            'alojamiento' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'desayuno' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'almuerzo' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'cena' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'gastosVarios' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'detalleGastosVarios' => 'required|string|max:1000',
            'transporte' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosCaja = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        Viatico::insert($datosCaja);
        $post = request()->input('descargo_id');
        return redirect('/registroViaticos/' . $post)->with('nuevo', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function show(Viatico $viatico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('viaticos_edit'), 403);
        $viatico = Viatico::findOrFail($id);
        return view('viatico.edit', compact('viatico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAlarma = request()->except(['_token', '_method', 'informe_id']);
        Viatico::where('id', '=', $id)->update($datosAlarma);
        $post = request()->input('descargo_id');
        return redirect('/registroViaticos/' . $post)->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Viatico  $viatico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('viaticos_destroy'), 403);
        $caja = Viatico::findOrFail($id);
        $idIn = $caja->descargo_id;
        Viatico::destroy($id);
        return redirect('/registroViaticos/' . $idIn)->with('eliminar', 'ok');
    }
}
