<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Existente;
use App\Models\Producto;
use App\Models\Inventari;
use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\Types\Array_;
use PDF;

class ExistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        abort_if(Gate::denies('existentes_index'), 403);
        $existentes = Existente::all();
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }

        $salidas = DB::select('SELECT codigoSal,SUM(cantidadSal) AS cantidadSalida
        FROM salidas AS SAL
        WHERE SAL.inventari_id = ' . $id . '
        GROUP BY codigoSal');
        $entradas = DB::select('SELECT codigoEn,SUM(cantidadEn) AS cantidadEntrada
        FROM entradas AS EN
        WHERE EN.inventari_id = ' . $id . '
        GROUP BY codigoEn');

        $stock = DB::select('SELECT t1.codigoEn AS codigoStock,(t3.resultado+ t1.resultado)-t2.resultado AS total FROM(
            SELECT codigoEn,SUM(cantidadEn) AS resultado FROM entradas WHERE entradas.inventari_id = ' . $id . ' GROUP BY codigoEn
            ) AS t1 
            LEFT JOIN
            (SELECT codigoSal,SUM(cantidadSal) AS resultado FROM salidas WHERE  salidas.inventari_id = ' . $id . ' GROUP BY codigoSal) 
            AS t2 ON t1.codigoEn=t2.codigoSal 
            LEFT JOIN
            (SELECT codigoProducto,SUM(existenciaInicial) AS resultado FROM existentes WHERE existentes.inventari_id = ' . $id . ' GROUP BY codigoProducto) 
            AS t3 ON t2.codigoSal=t3.codigoProducto');

        //return $stock;
        //return view('existente.index', compact('id','resul','sal','ent','sto'))->with(['existentes' => $existentes, 'entradas' => $entradas, 'salidas' => $salidas, 'stocks' => $stock]);
        return view('existente.index', compact('id', 'resul'))->with(['existentes' => $existentes, 'entradas' => $entradas, 'salidas' => $salidas, 'stocks' => $stock]);
    }

    public function pdf($id)
    {
        abort_if(Gate::denies('existentes_pdf'), 403);
        $existentes = Existente::all();

        $inventarios = Inventari::all();

        $salidas = DB::select('SELECT codigoSal,SUM(cantidadSal) AS cantidadSalida
        FROM salidas AS SAL
        WHERE SAL.inventari_id = ' . $id . '
        GROUP BY codigoSal');
        $entradas = DB::select('SELECT codigoEn,SUM(cantidadEn) AS cantidadEntrada
        FROM entradas AS EN
        WHERE EN.inventari_id = ' . $id . '
        GROUP BY codigoEn');

        $stocks = DB::select('SELECT t1.codigoEn AS codigoStock,(t3.resultado+ t1.resultado)-t2.resultado AS total FROM(
            SELECT codigoEn,SUM(cantidadEn) AS resultado FROM entradas WHERE entradas.inventari_id = ' . $id . ' GROUP BY codigoEn
            ) AS t1 
            LEFT JOIN
            (SELECT codigoSal,SUM(cantidadSal) AS resultado FROM salidas WHERE  salidas.inventari_id = ' . $id . ' GROUP BY codigoSal) 
            AS t2 ON t1.codigoEn=t2.codigoSal 
            LEFT JOIN
            (SELECT codigoProducto,SUM(existenciaInicial) AS resultado FROM existentes WHERE existentes.inventari_id = ' . $id . ' GROUP BY codigoProducto) 
            AS t3 ON t2.codigoSal=t3.codigoProducto');

        $pdf = PDF::loadView('existente.pdf', ['existentes' => $existentes, 'entradas' => $entradas, 'salidas' => $salidas, 'stocks' => $stocks, 'resId' => $id, 'inventarios' => $inventarios]);
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
        abort_if(Gate::denies('existentes_create'), 403);
        $producto['productos'] = Producto::all();
        $exis = Existente::all();
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        return view('existente.create', $producto, compact('id', 'resul'))->with(['exis' => $exis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$existentes = Existente::all();
        $campos = [
            'codigoProducto' => 'required|string|max:1000',
            'descripcionEx' => 'required|string|max:1000',
            'existenciaInicial' => 'required|integer|max:1000'
        ];
        $mensaje = [
            'required' => ':attribute es requerido'
        ];
        //VALIDACION DE DATOS
        $this->validate($request, $campos, $mensaje);
        //$codigos = request()->except('_token', 'descripcionEx', 'existenciaInicial');
        $datosExistentes = request()->except('_token');
        $alerta = '';
        $prueba = json_encode($datosExistentes['codigoProducto']);
        $post = request()->input('inventari_id');
        $results = DB::select('SELECT codigoProducto AS resultado
        FROM existentes AS EX
        WHERE EX.codigoProducto LIKE ' . $prueba . ' AND inventari_id = ' . $post . '
        GROUP BY codigoProducto');

        if ($results == null) {
            Existente::insert($datosExistentes);
            $alerta = 'ok';
        } else {
            $alerta = 'error';
        }
        //return dd($alerta);
        return redirect('/existenteInventario/' . $post)->with('nuevo', $alerta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function show(Existente $existente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('existentes_edit'), 403);
        $existente = Existente::findOrFail($id);
        $exis = Existente::all();

        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($existente->inventari_id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        $producto['productos'] = Producto::all();
        return view('existente.edit', $producto, compact('existente', 'resul'))->with(['exis' => $exis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosExistente = request()->except(['_token', '_method']);

        //$exis = Existente::all();
        $post = request()->input('inventari_id');
        $prueba = json_encode($datosExistente['codigoProducto']);
        $results = DB::select('SELECT codigoProducto AS resultado
        FROM existentes AS EX
        WHERE EX.codigoProducto LIKE ' . $prueba . ' AND inventari_id = ' . $post . '
        GROUP BY codigoProducto');

        if ($results == null) {
            Existente::where('id', '=', $id)->update($datosExistente);
            $alerta = 'ok';
        } else {
            $alerta = 'error';
        }
        return redirect('/existenteInventario/' . $post)->with('actualizar', $alerta);
        //return redirect('existentes')->with('mensaje','Inventario modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Existente  $existente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('existentes_destroy'), 403);
        $existente = Existente::findOrFail($id);
        $idIn = $existente->inventari_id;
        Existente::destroy($id);
        return redirect('/existenteInventario/' . $idIn)->with('aliminar', 'ok');
    }

    public function selectDinamico(Request $request)
    {
        if ($request->ajax()) {
            $descripciones = Existente::where('codigoProducto', $request->codigo)->get();
            foreach ($descripciones as $descrip) {
                $descArray[0] = $descrip->descripcion;
            };
            return response()->json($descArray);
        }
    }
}
