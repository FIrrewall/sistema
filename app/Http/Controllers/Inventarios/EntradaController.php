<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Inventari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('entradas_index'), 403);
        $datos['entradas'] = Entrada::all();
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        return view('entrada.index', $datos, compact('id','resul'));
    }
    public function pdf($id)
    {
        abort_if(Gate::denies('entradas_pdf'), 403);
        $entradas = Entrada::all();
        $inventarios = Inventari::all();
        $pdf = PDF::loadView('entrada.pdf', ['entradas' => $entradas, 'resId' => $id, 'inventarios' => $inventarios]);
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
        abort_if(Gate::denies('entradas_create'), 403);
        $producto['productos'] = Producto::all();
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        return view('entrada.create', $producto, compact('id','resul'));
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
            'numeroFactura' => 'required|integer|max:100000000',
            'numeroNotaEn' => 'required|integer|max:1000000',
            'fecha' => 'required|date_format:Y-m-d',
            'codigoEn' => 'required|string|max:1000',
            'descripcionEn' => 'required|string|max:1000',
            'cantidadEn' => 'required|integer|max:1000',
        ];
        $mensaje = [
            'required' => ':attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosEntrada = request()->except('_token');

        Entrada::insert($datosEntrada);
        $post = request()->input('inventari_id');
        return redirect('/entradaInventario/' . $post)->with('nuevo','ok');
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
        abort_if(Gate::denies('entradas_edit'), 403);
        $entrada = Entrada::findOrFail($id);
        $producto['productos'] = Producto::all();
        $inve = Inventari::all();
        foreach ($inve as $inv) {
            if ($entrada->inventari_id == $inv->id) {
                $resul = $inv->descripcion;
            }
        }
        //dd($inv->id);
        return view('entrada.edit', $producto, compact('entrada','resul'));
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
        $datosEntrada = request()->except(['_token', '_method']);


        Entrada::where('id', '=', $id)->update($datosEntrada);

        $post = request()->input('inventari_id');
        return redirect('/entradaInventario/' . $post)->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('entradas_destroy'), 403);
        $entrada = Entrada::findOrFail($id);
        $idIn = $entrada->inventari_id;
        Entrada::destroy($id);
        return redirect('/entradaInventario/' . $idIn)->with('eliminar','ok');
    }
}
